
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top heading">
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-vertical uk-margin-remove">
                                <ul class="uk-breadcrumb">
                                    <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                                    <li><span>User</span></li>
                                </ul>
                            </div>
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-bottom uk-clearfix">
                                <a class="uk-button button-success-line uk-float-right" href="<?php echo base_url(); ?>user/tambah"><span class="iconify" data-icon="akar-icons:plus" data-inline="false"></span> Tambah</a>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-margin-remove">
                            <div class="uk-width-1-1 uk-padding-small uk-margin-remove table">
                                <table class="uk-table uk-table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Photo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($user as $a) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $a->full_name; ?></td>
                                            <td><?php echo $a->username; ?></td>
                                            <td><img style="width:50px" src="<?php echo base_url(); ?>assets/img/user/<?php if($a->photo != null) echo $a->photo; else { echo "default.png"; } ?>">
                                            <td>
                                                <a href="<?php echo base_url(); ?>user/edit?id=<?php echo $a->id; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="fa-solid:pen" data-inline="false"></span></a>
                                                <a href="<?php echo base_url(); ?>user/hapus?id=<?php echo $a->id; ?>" class="uk-button uk-button-danger uk-button-small"><span class="iconify" data-icon="bx:bxs-trash-alt" data-inline="false"></span></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>