<div class="col-6 m-a m-t-5">
    <?= $form ?>
        <?= getFlashdata("error") ?>
        <div class="f-input">
            <span>Username</span>
            <?= getError("username") ?>
            <input type="text" name="username" placeholder="Masukkan Username ...">
        </div>
        <div class="f-input">
            <span>Password</span>
            <?= getError("password"); ?>
            <input type="password" name="password" placeholder="Masukkan Password ...">
        </div>
        <div class="center">
            <button class="btn t1 green">SUBMIT</button>
        </div>
    </form>
</div>