<div class="p-x">
    <div class="col-6 m-a">
        <?= $form ?>
            <div class="f-input">
                <span>Nama Udud</span>
                <?= getError("nama_udud") ?>
                <input type="text" name="nama_udud" value="<?= isOld("nama_udud", $input_nama) ?>" placeholder="Masukkan Nama Udud ...">
            </div>
            <div class="f-input">
                <span>Harga Udud</span>
                <?= getError("harga_udud") ?>
                <input type="number" name="harga_udud" value="<?= isOld("harga_udud", $input_harga)  ?>" id="harga-udud" placeholder="Masukkan Harga Udud ...">
                <span id="rp-udud"></span>
            </div>
            <div class="f-input">
                <span>Photo Udud</span>
                <?= getFlashdata("error-photo")?>
                <input multiple type="file" name="photo_udud[]">
            </div>
            <?PHP if($input_photo != NULL && count($input_photo) != 0): ?>
                <div class="col-mx">
                    <?PHP 
                        foreach($input_photo as $photo):
                            if($photo != NULL):
                    ?>
                                <div class="img wd-20 pos-rel dis-ib">
                                    <a href="<?= base_url("home/delete-image/" . uriSegment(3) . "~" . $photo) ?>" class="delete-image btn t8 red p-v pos-abs" style="top:0;right:0;">X</a>
                                    <img src="<?= base_url('public/photos/' . $photo) ?>" alt="<?= $input_nama ?>">
                                </div>
                    <?PHP 
                            endif;
                        endforeach; 
                    ?>
                </div>
            <?PHP endif; ?>
            <div class="col-mx center">
                <button type="submit" class="btn t8 green">SUBMIT</button>
                <a class="btn t8 blue" href="<?= $back ?>">BACK</a>
            </div>
        </form>
    </div>
</div>