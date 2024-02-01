import sqlite3
import base64

# Connecter à la base de données SQLite existante
conn = sqlite3.connect('db.sqlite')
cursor = conn.cursor()

def insert_band(cursor, name_band, image_path):
    cursor.execute('''
        INSERT INTO Band (name_band, image_band)
        VALUES (?, ?)
    ''', (name_band, base64.b64encode(open(image_path, 'rb').read())))

def insert_album(cursor, name_album, image_path):
    cursor.execute('''
        INSERT INTO Album (name, image_album)
        VALUES (?, ?)
    ''', (name_album, base64.b64encode(open(image_path, 'rb').read())))

def insert_song(cursor, name_song, genre, release_year, duration, id_band, id_album, image_path):
    cursor.execute('''
        INSERT INTO Song (name, genre, release_date, duration, id_band, id_album, image_song)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ''', (name_song, ', '.join(genre), f"{release_year}-01-01", duration, id_band, id_album, base64.b64encode(open(image_path, 'rb').read())))

# Insérer les données dans la table 'Band'
insert_band(cursor, '16 Horsepower', './fixtures/images/220px-Folklore_hp.jpg')
insert_band(cursor, 'Ryan Adams', './fixtures/images/220px-RyanAdamsHeartbreaker.jpg')
# ... (insérer d'autres groupes)

# Récupérer les ID des groupes nouvellement insérés
cursor.execute('SELECT id_band FROM Band WHERE name_band = ?', ('16 Horsepower',))
horsepower_band_id = cursor.fetchone()[0]

cursor.execute('SELECT id_band FROM Band WHERE name_band = ?', ('Ryan Adams',))
ryan_adams_band_id = cursor.fetchone()[0]

# Insérer les données dans la table 'Album'
insert_album(cursor, 'Folklore', './fixtures/images/220px-Folklore_hp.jpg')
# ... (insérer d'autres albums)

# Récupérer les ID des albums nouvellement insérés
cursor.execute('SELECT id_album FROM Album WHERE name = ?', ('Folklore',))
folklore_album_id = cursor.fetchone()[0]

# Insérer les données dans la table 'Song'
insert_song(cursor, 'Folklore', ['Alternative country', 'neofolk'], 2002, 0, 1, folklore_album_id, './fixtures/images/220px-Folklore_hp.jpg')
# ... (insérer d'autres chansons)


# Commit des changements et fermer la connexion
conn.commit()
conn.close()