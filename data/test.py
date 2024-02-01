import sqlite3
from PIL import Image
from io import BytesIO
import base64

def fetch_and_display_album_image(album_id):
    try:
        # Connexion à la base de données SQLite
        conn = sqlite3.connect('db.sqlite')
        cursor = conn.cursor()

        # Récupération du BLOB de l'image depuis la base de données
        cursor.execute("SELECT image_album FROM Album WHERE id_album = ?", (album_id,))
        blob_data = cursor.fetchone()

        if blob_data:
            # Convertit le BLOB en une image PIL
            image = Image.open(BytesIO(base64.b64decode(blob_data[0])))

            # Affiche l'image
            image.show()
        else:
            print(f'Aucune image trouvée pour l\'album avec l\'identifiant {album_id}')

    except sqlite3.Error as e:
        print(f'Erreur SQLite : {e}')

    finally:
        # Fermeture de la connexion à la base de données
        if conn:
            conn.close()

# Appelez la fonction avec l'identifiant de l'album que vous souhaitez afficher
fetch_and_display_album_image(1)
