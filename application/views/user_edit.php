
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div
                            class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top heading">
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-vertical uk-margin-remove">
                                <ul class="uk-breadcrumb">
                                    <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                                    <li><a href="<?php echo base_url(); ?>user">User</a></li>
                                    <li><span>Edit</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-2-3 uk-padding">
                            <form class="uk-form-stacked" method="POST" action="<?php echo base_url(); ?>user/edit_aksi" enctype='multipart/form-data'>

                                
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">ID</label>
                                    <div class="uk-form-controls">
                                        <?php echo $user->id; ?>
                                        <input type="hidden" value="<?php echo $user->id; ?>" name="id">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Nama Lengkap</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input field-default" id="form-stacked-text" type="text" value="<?php echo $user->full_name; ?>" name="nama" placeholder="Nama Lengkap...">
                                    </div>
                                </div>
                            
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Username</label>
                                    <div class="uk-form-controls">
                                        <input type="hidden" name="username_lama" value="<?php echo $user->username; ?>">
                                        <input class="uk-input field-default" id="form-stacked-text" type="text" value="<?php echo $user->username; ?>" name="username" placeholder="Username...">
                                    </div>
                                </div>
                            
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Ganti Password</label>
                                    <input type="hidden" name="password_lama" value="<?php echo $user->password; ?>">
                                    <div class="uk-inline uk-width-1-1">
                                        <a class="uk-form-icon uk-form-icon-flip" id="buttonShowPassword" onclick="showPassword()"><span class="iconify"
                                                data-icon="bx:bxs-show" data-inline="false"></span></a>
                                        <input class="uk-input field-default" id="myInput" type="password" name="password" placeholder="Password...">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <input type="hidden" name="photo_lama" value="<?php echo $user->photo; ?>">
                                    <img style="height: 75px" src="<?php echo base_url(); ?>assets/img/user/<?php if($user->photo != null) echo $user->photo; else echo "default.png"; ?>">
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Ganti Photo</label>
                                    <div uk-form-custom="target: true">
                                        <input name="photo" type="file" required>
                                        <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled><br>
                                        <small class="uk-text-danger">Photo Max 1Gb Berformat PNG, JPG, JPEG</small>
                                    </div>
                                </div>

                                <div class="uk-margin uk-clearfix">
                                    <input type="submit" class="uk-button button-success uk-float-right" value="SIMPAN">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>