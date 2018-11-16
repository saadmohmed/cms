
<table class="table table-border table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Role</th>
                                    <th>RandSalt</th>
                                    <th>Admin</th>
                                    <th>Subscriber</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php view_all_users(); ?>
                            <?php delete_from_users(); ?>
                          
                           
                                </tr>
                            </tbody>
                        </table>