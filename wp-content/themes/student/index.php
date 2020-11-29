<?php
global $user_ID;
global $wpdb;
get_header();
?>

<div class="dashboard-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="row text-center">
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6">
                        <a href="#">
                            <div class="icon-card">
                                <i class="fa fa-user"></i>
                                <p>Create Student</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6">
                        <a href="<?php echo wp_logout_url('/login') ?>">
                            <div class="icon-card">
                                <i class="fa fa-sign-out"></i>
                                <p>Sign out</p>
                            </div>
                        </a>
                    </div>
                </div>



            </div>
            <div class="col-lg-9">
                <?php
                if (isset($_POST['stsubmit'])) {

                    $stfullname = esc_sql($_POST['stfullname']);
                    $staddress = esc_sql($_POST['staddress']);
                    $stnic = esc_sql($_POST['stnic']);
                    $stdob = esc_sql($_POST['stdob']);

                    $error = array();

                    if (empty($stfullname)) {
                        $error['fullname_empty'] = "Fullname field is required!";
                    }

                    if (empty($staddress)) {
                        $error['address_empty'] = "Address field is required!";
                    }

                    if (strpos($stnic, ' ') !== FALSE) {
                        $error['nic_space'] = "NIC cannot have empty space!";
                    }

                    if (empty($stnic)) {
                        $error['nic_empty'] = "NIC field is required!";
                    }

                    if (strpos($stdob, ' ') !== FALSE) {
                        $error['dob_space'] = "Date of birth cannot have empty space!";
                    }

                    if (empty($stdob)) {
                        $error['dob_empty'] = "Date of birth field is required!";
                    }

                    $tablename = $wpdb->prefix . STDB_TABLE_NAME_POSTFIX;

                    $niccount = $wpdb->get_var('SELECT COUNT(*) FROM ' . $tablename . ' WHERE stnic = "' . $stnic . '"');

                    if ($niccount > 0) {
                        $error['nic_exists'] = "NIC already exists!";
                    }


                    if (count($error) == 0) {
                        student_create_db();

                        $data = array(
                            'stfullname' => $stfullname,
                            'staddress' => $staddress,
                            'stnic' => $stnic,
                            'stdob' => $stdob,
                        );

                        $dbinsert = $wpdb->insert($tablename, $data);
                        if ($dbinsert > 0) {
                            echo '<div class="alert alert-success">';

                            echo 'Student record is successfully inserted!';

                            echo '</div>';
                        }
                    } else {
                        echo '<div class="alert alert-dark"><ul>';
                        foreach ($error as $key => $val) {
                            echo '<li>' . $val . '</li>';
                        }
                        echo '</ul></div>';
                    }
                }
                ?>
                <form action="<?php echo esc_url(get_site_url()); ?>/" method="post" class="contact-form" data-toggle="validator">
                    <div class="row" style="padding: 10px;">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <!--<i class="contact-icon fa fa-user"></i>-->
                                <label for="fullname">Fullname*</label>
                                <input type="text" class="form-control" name="stfullname" id="stfullname" data-error="Please Enter Fullname" value="<?php echo isset($_POST['stfullname']) ? $_POST['stfullname'] : '' ?>">

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <!--<i class="contact-icon fa fa-user"></i>-->
                                <label for="address">Address*</label>
                                <input type="text" class="form-control" name="staddress" id="staddress" data-error="Please Enter Address" value="<?php echo isset($_POST['staddress']) ? $_POST['staddress'] : '' ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <!--<i class="contact-icon fa fa-user"></i>-->
                                <label for="nic">NIC*</label>
                                <input type="text" class="form-control" name="stnic" id="stnic" data-error="Please Enter NIC" value="<?php echo isset($_POST['stnic']) ? $_POST['stnic'] : '' ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <!--<i class="contact-icon fa fa-user"></i>-->
                                <label for="dob">Date of Birth*</label>
                                <input type="text" class="form-control" name="stdob" id="stdob" data-error="Please Enter DOB" value="<?php echo isset($_POST['stdob']) ? $_POST['stdob'] : '' ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-xs-12">

                            <div class="help-block with-errors"></div>
                            <button type="submit" name="stsubmit" class="submit-btn">SAVE</button>
                            <button type="reset" class="reset-btn">RESET</button>


                        </div>
                    </div>
                </form>

                <br><br>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>Firstname</th>
                            <th>Address</th>
                            <th>NIC</th>
                            <th>DOB</th>
                        </tr>
                        <?php
                        global $wpdb;
                        $tablename = $wpdb->prefix . STDB_TABLE_NAME_POSTFIX;
                        $result = $wpdb->get_results('SELECT * FROM ' . $tablename);
                        foreach ($result as $print) {
                        ?>
                            <tr>
                                <td><?php echo $print->stfullname; ?></td>
                                <td><?php echo $print->staddress; ?></td>
                                <td><?php echo $print->stnic; ?></td>
                                <td><?php echo $print->stdob; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>