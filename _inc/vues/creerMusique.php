<p>Musique</p>

<form action="./_inc/methodes/creerMusique.php" method="POST" enctype="multipart/form-data">
    <input style="color:white !important" name="fichier" type="file"/></br>
    <input type="text" name="nom" placeholder="Nom de la musique"/></br>
    <select name="selection">
        <?php
        use classes\DataLoaderSQLite;
        $dl = new DataLoaderSQLite();
        $songs = $dl->getAllAlbums();
        for ($i = 0; $i < count($songs); $i++) {
            echo "<option value='" . $songs[$i]['id'] . "'>" . $songs[$i]["title"] . "</option>";
        }
        ?>
    </select>
    <button type="submit">Créer la musique</button>
</form>

<style>
    input{
        color: black;
    }
    button{
        color: black;
    }
    select{
        background-color: black;
    }
</style>