                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div
                            class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top heading">
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-vertical uk-margin-remove">
                                <ul class="uk-breadcrumb">
                                    <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                                    <li><span>Pegawai</span></li>
                                </ul>
                            </div>
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-bottom uk-clearfix">
                                <a class="uk-button button-success-line uk-float-right" href="#modal-overflow" uk-toggle><span
                                        class="iconify" data-icon="akar-icons:plus" data-inline="false"></span>
                                    Tambah</a>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-margin-remove">
                            <div class="uk-width-1-1 uk-padding-small uk-margin-remove table">
                                <table id="data_table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Username</th>
                                            <th>TTL</th>
                                            <th>Photo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pegawai as $a) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $a->full_name; ?></td>
                                            <td><?php echo $a->jenkel; ?></td>
                                            <td><?php echo $a->username; ?></td>
                                            <td><?php echo $a->tempat_lhr.', '.date('d F Y', strtotime($a->tanggal_lhr)); ?></td>
                                            <td><img style="width:50px" src="<?php echo base_url(); ?>assets/img/pegawai/<?php if($a->photo != null) echo $a->photo; else { echo "default.png"; } ?>"></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>pegawai/edit?id=<?php echo $a->id; ?>"
                                                    class="uk-button button-uk-warning uk-button-small"><span
                                                        class="iconify" data-icon="fa-solid:pen"
                                                        data-inline="false"></span></a>
                                                <a href="<?php echo base_url(); ?>pegawai/hapus?id=<?php echo $a->id; ?>"
                                                    class="uk-button uk-button-danger uk-button-small"><span
                                                        class="iconify" data-icon="bx:bxs-trash-alt"
                                                        data-inline="false"></span></a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="modal-overflow" class="uk-modal-container" uk-modal>
                        <div class="uk-modal-dialog">
                    
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                    
                            <div class="uk-modal-header">
                                <h2 class="uk-modal-title">Tambah Pegawai</h2>
                            </div>

                            <form class="uk-form-stacked" method="POST" enctype='multipart/form-data' action="<?php echo base_url(); ?>pegawai/tambah_aksi">
                                <div class="uk-modal-body" uk-overflow-auto>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">ID</label>
                                        <div class="uk-form-controls">
                                            <?php echo $id; ?>
                                            <input name="id" value="<?php echo $id; ?>" type="hidden" required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Nama Lengkap</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input field-default" id="form-stacked-text" name="nama" type="text"
                                                placeholder="Nama Lengkap..." required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <div class="uk-form-label">Jenis Kelamin</div>
                                        <div class="uk-form-controls uk-form-controls-text" uk-grid>
                                            <div class="uk-width-1-2@s">
                                                <label><input class="uk-radio" type="radio" value="laki-laki" name="jenkel" required> Laki-laki</label>
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <label><input class="uk-radio" type="radio" value="perempuan" name="jenkel" required> Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">No Telepon</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input field-default" id="form-stacked-text" name="no_hp" type="text"
                                                placeholder="No Telepon..." required>
                                        </div>
                                    </div>
                                
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Username</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input field-default" id="form-stacked-text" name="username" type="text"
                                                placeholder="Username..." required>
                                        </div>
                                    </div>
                                
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Password</label>
                                        <div class="uk-inline uk-width-1-1">
                                            <a class="uk-form-icon uk-form-icon-flip" id="buttonShowPassword" onclick="showPassword()"><span
                                                    class="iconify" data-icon="bx:bxs-show" data-inline="false"></span></a>
                                            <input class="uk-input field-default" id="myInput" type="password" name="password"
                                                placeholder="Password..." required>
                                        </div>
                                    </div>
                                
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Tempat, Tanggal Lahir</label>
                                        <div class="uk-form-controls" uk-grid>
                                            <div class="uk-width-1-2@s">
                                                <input class="uk-input" type="text" name="tmp_lahir" placeholder="Tempat Lahir" required>
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <input class="uk-input" type="date" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Photo</label>
                                        <div uk-form-custom="target: true">
                                            <input name="photo" type="file" required>
                                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
                                        </div>
                                    </div>
                                
                                </div>
                        
                                <div class="uk-modal-footer uk-text-right">
                                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                    <input type="submit" class="uk-button uk-button-primary" value="SAVE">
                                </div>
                            </form>
                    
                        </div>
                    </div>
                </div>