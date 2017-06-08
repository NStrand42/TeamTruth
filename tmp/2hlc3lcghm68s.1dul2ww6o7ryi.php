<head>
<?php echo $this->render('view/header.html',NULL,get_defined_vars(),0); ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <!--Left side-->
            <div class="col-sm-3">
                
                <div class="row">
                    <div class="col-sm-6">
                        <ul>
                            <li>Truth</li>
                            <li>Relationships</li>
                            <li>Favorites</li>
                            <li>Teen</li>
                            <li>Kids</li>
                            <li>Random</li>
                            <li>My personal</li>
                            <li>Create you own</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul>
                            <li>Dare</li>
                            <li>Relationships</li>
                            <li>Favorites</li>
                            <li>Teen</li>
                            <li>Kids</li>
                            <li>Random</li>
                            <li>My personal</li>
                            <li>Create your own</li>
                        </ul>                       
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <a href="./howtopage" class="btn btn-lg btn-success btn-block login-button" role="button">Tutorial</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class ="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>Welcome John Doe!</h3>
                                <hr />
                                <h3>Score : ###</h3>
                                <hr />
                                <h3>Submissions: ###</h3>    
                            </div>
                        </div>     
                    </div>
                </div>
                
            </div>
            <!--right side-->
            <div class="col-sm-9">
                
                <div class="row">
                    <div class="col-sm-6">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                       <h1>Player 1: ##</h1> 
                                    </div>                               
                                </div>     
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h1>Truth</h1></div>
                                    <div class="panel-body"><h6>Name your favorite food</h6></div>
                                    <div class="panel-heading"><h1>Chicken -1 Score</h1></div>
                                    
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-sm-6">                                         
                                                <h1>Like</h1>                                             
                                            </div>
                                            <div class="col-sm-6">                                           
                                                <h1>Dislike</h1>                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-sm-6">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                       <h1>Player 2: ###</h1> 
                                    </div>                               
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h1>Dare</h1></div>
                                    <div class="panel-body"><h6>Do a handstand</h6></div>
                                    <div class="panel-heading"><h1>Chicken -4 Score</h1></div>
                                    
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-sm-6">                                         
                                                <h1>Like</h1>                                             
                                            </div>
                                            <div class="col-sm-6">                                           
                                                <h1>Dislike</h1>                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel body"><h1>Player 1's Turn! Score ###</h1></div>                         
                        </div>    
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="col-sm-3">
                            
                            
                            <?php if ($usernameCheck): ?>
                                
                                    <a href="./logout" class="btn btn-lg btn-success btn-block login-button" role="button">Logout</a>    
                                
                                <?php else: ?>
                                    <button type="modal" class="btn btn-lg btn-success btn-block login-button" data-toggle="modal" data-target="#myModal">Create User</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Create User</h4>
                                          </div>
                                          <div class="modal-body">
                                            <form action="./" method="post" class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="inputUsername" class="sr-only">Username</label>
                                                    <input type="text"  class="form-control" name="createUsername" placeholder="Username" value="<?= $username ?>" required autofocus>
                                                    <label for="inputPassword" class="sr-only">Password</label>
                                                    <input type="password" class="form-control" name="createPassword" placeholder="Password"  required autofocus>
                                                    <label for="inputVerifyPassword" class="sr-only">Password</label>
                                                    <input type="password" class="form-control" name="verifyPassword" placeholder="Re-enter Password"  required autofocus>
                                                </div>
                                                
                                              <button class="btn btn-lg btn-success btn-block login-button" type="submit">Log in</button>
                                            </form>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                
                                
                            <?php endif; ?>
                            
                            
                        </div>
                        <div class="col-sm-3 col-sm-offset-6">
                            
                            <?php if ($usernameCheck): ?>
                                
                                    <a href="./submissions" class="btn btn-lg btn-success btn-block login-button" role="button">My Submissions</a>
                                
                                <?php else: ?>
                                    <button type="modal" class="btn btn-lg btn-success btn-block login-button" data-toggle="modal" data-target="#myModal2">Login</button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal2" role="dialog">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Login</h4>
                                          </div>
                                          <div class="modal-body">
                                            <form action="./" method="post" class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="inputUsername" class="sr-only">Username</label>
                                                    <input type="text"  class="form-control" name="username" placeholder="Username" value="<?= $username ?>" required autofocus>
                                                    <label for="inputPassword" class="sr-only">Password</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Password"  required autofocus>
                                                </div>
                                                
                                              <button class="btn btn-lg btn-success btn-block login-button" type="submit">Log in</button>
                                            </form>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                
                            <?php endif; ?>
                            
                        </div> 
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>