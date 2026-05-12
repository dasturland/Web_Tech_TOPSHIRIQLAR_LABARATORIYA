import sqlite3
import os
schema_path = os.path.join(os.path.dirname(__file__), 'schema.sql')
db_path = os.path.join(os.path.dirname(__file__), 'database.db')
if not os.path.exists(schema_path):
    print('schema.sql not found at', schema_path)
    raise SystemExit(1)
with open(schema_path, 'r', encoding='utf-8') as f:
    schema = f.read()
# remove existing db
if os.path.exists(db_path):
    os.remove(db_path)
conn = sqlite3.connect(db_path)
try:
    cur = conn.cursor()
    cur.executescript(schema)
    conn.commit()
    print('database.db created at', db_path)
finally:
    conn.close()
