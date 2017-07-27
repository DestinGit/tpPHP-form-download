<div class="bg-success text-center textCustom"><?=$message?></div>
<!-- Affichage des erreurs -->
<?php if(count($errors)): ?>
    <div class="bg-danger text-center textCustom">
        <ul>
            <?php foreach ($errors as $item): ?>
                <li><?= $item; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend class="well text-center">Upload/Download un fichier</legend>
        <div class="form-group">
            <label for="inputFile">Entrée de fichier</label>
            <input type="file" id="inputFile" name="fileLoad">
            <p class="help-block">accepte tous les fichiers sauf les fichiers scripts</p>
        </div>
        <div class="form-group">
            <label for="fileTitle">Titre du fichier</label>
            <input type="text" id="fileTitle" name="fileTitle" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn bg-primary btn-block">Uploader</button>
        </div>
    </fieldset>
</form>

<li class="hidden" id="liModel">
    <a></a>
</li>

<form>
    <fieldset>
        <legend>Liste des fichiers</legend>
        <ul id="fileList">
            <?php foreach ($list as $fileName): ?>
                <li>
                    <a href="download.php?file=<?= $fileName ?>"><?= $fileName; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </fieldset>
</form>