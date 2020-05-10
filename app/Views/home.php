<div class="p-x">
    <div class="col-mx">
        <h3>Daftar Udud</h3>
        <?= getFlashdata("success") ?>
        <a href="<?= base_url("home/add") ?>" class="btn t8 p-v green">TAMBAH</a>
        <table class="table-default">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Udud</th>
                    <th>Harga Udud</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?PHP $no = 1; foreach($udud as $u): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $u->nama_udud ?></td>
                        <td><?= toRupiah($u->harga_udud) ?></td>
                        <td>
                            <a href="<?= base_url("home/edit/" . $u->id) ?>" class="btn t8 p-v blue">EDIT</a>
                            <a href="<?= base_url("home/delete/" . $u->id) ?>" class="btn t8 p-v red delete">DELETE</a>
                        </td>
                    </tr>
                <?PHP endforeach; ?>
            </tbody>
        </table>
    </div>
</div>