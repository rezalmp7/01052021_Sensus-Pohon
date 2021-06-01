                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div
                            class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top heading">
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-vertical uk-margin-remove">
                                <ul class="uk-breadcrumb">
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><a href="pegawai.html">Pegawai</a></li>
                                    <li><span>Tambah</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-2-3 uk-padding">
                            <form class="uk-form-stacked" method="POST" enctype='multipart/form-data' action="<?php echo base_url(); ?>pegawai/edit_aksi">
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">ID</label>
                                    <div class="uk-form-controls">
                                        <input value="<?php echo $pegawai->id; ?>" name="id" type="hidden" required><?php echo $pegawai->id; ?>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Nama Lengkap</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input field-default" id="form-stacked-text" value="<?php echo $pegawai->full_name; ?>" name="nama" type="text"
                                            placeholder="Nama Lengkap..." required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-label">Jenis Kelamin</div>
                                    <div class="uk-form-controls uk-form-controls-text" uk-grid>
                                        <div class="uk-width-1-2@s">
                                            <label><input class="uk-radio" type="radio" value="laki-laki" <?php if($pegawai->jenkel == 'laki-laki') echo 'checked'; ?> name="jenkel" required> Laki-laki</label>
                                        </div>
                                        <div class="uk-width-1-2@s">
                                            <label><input class="uk-radio" type="radio" value="perempuan" <?php if($pegawai->jenkel == 'perempuan') echo 'checked'; ?> name="jenkel" required> Perempuan</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">No Telepon</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input field-default" id="form-stacked-text" value="<?php echo $pegawai->no_hp; ?>" name="no_hp" type="text"
                                            placeholder="No Telepon..." required>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Username</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input field-default" value="<?php echo $pegawai->username; ?>" id="form-stacked-text" name="username" type="text"
                                            placeholder="Username..." required>
                                        <input value="<?php echo $pegawai->username; ?>" id="form-stacked-text" name="username_lama" type="hidden"
                                             required>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Ganti Password</label>
                                    <div class="uk-inline uk-width-1-1">
                                        <a class="uk-form-icon uk-form-icon-flip" id="buttonShowPassword"
                                            onclick="showPassword()"><span class="iconify" data-icon="bx:bxs-show"
                                                data-inline="false"></span></a>
                                        <input type="hidden" name="password_lama" value="<?php echo $pegawai->password; ?>">
                                        <input class="uk-input field-default" id="myInput" type="password"
                                            name="password" placeholder="Password...">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Tempat, Tanggal Lahir</label>
                                    <div class="uk-form-controls" uk-grid>
                                        <div class="uk-width-1-2@s">
                                            <input class="uk-input" type="text" name="tmp_lahir" value="<?php echo $pegawai->tempat_lhr; ?>" placeholder="Tempat Lahir" required>
                                        </div>
                                        <div class="uk-width-1-2@s">
                                            <input class="uk-input" type="date" name="tgl_lahir" value="<?php echo $pegawai->tanggal_lhr; ?>" placeholder="Tanggal Lahir" required>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="uk-margin">
                                    <input type="hidden" name="photo_lama" value="<?php echo $pegawai->photo; ?>">
                                    <img style="height: 100px" src="<?php echo base_url(); ?>assets/img/pegawai/<?php if($pegawai->photo != null) echo $pegawai->photo; else { echo "default.png"; } ?>">
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Ganti Photo</label>
                                    <div uk-form-custom="target: true">
                                        <input name="photo" type="file">
                                        <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
                                    </div>
                                </div>

                                <div class="uk-margin uk-clearfix">
                                    <input type="submit" class="uk-button button-success uk-float-right" value="SIMPAN">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>