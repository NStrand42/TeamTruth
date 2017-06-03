<head>
<?php echo $this->render('view/header.html',NULL,get_defined_vars(),0); ?>
</head>
<body>
    <div class="container">       
        <div class="row">
            
            <div class="col-sm-12">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-5">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>Please enter a new Truth</h4></div>
                            <div class="panel-body"><h4>New Truth</h4>
                                <form action="http://mbourque.greenrivertech.net/328/TeamTruth/submissions" method="post" class="form-horizontal">
                                    <div class="col-sm-12">                                        
                                            <label for="inputUsername" class="sr-only">Portrait</label>
                                            <input type="text" class="form-control" name="truthQuestion" placeholder="Enter new truth"value="" required autofocus>
                                            
                                            <label for="category" class="sr-only">Category</label>
                                            <select class="form-control" name="tCategory" id="category" value="<?= $previousChosen ?>">
                                                <?php foreach (($categoryArray?:[]) as $category): ?>
                                                    <option><?= $category ?></option>
                                                <?php endforeach; ?>
                                            </select>            
                                    </div>
                                        
                                    <div class="col-sm-6">
                                        <button class="btn btn-lg btn-success btn-block login-button" type="submit">OK</button>
                                    </div>
                                </form>                                  
                            </div>
                        </div>                   
                    </div>
                    <div class="col-sm-5 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>Please enter a new Dare</h4></div>
                            <div class="panel-body"><h4>New Dare</h4>
                                <form action="http://mbourque.greenrivertech.net/328/TeamTruth/submissions" method="post" class="form-horizontal">
                                    <div class="col-sm-12">
                                        
                                        <label for="inputUsername" class="sr-only">Portrait</label>
                                        <input type="text" class="form-control" name="dareQuestion" placeholder="Enter new Dare"value="" required autofocus>
                                        <label for="category" class="sr-only">Category</label>
                                            <select class="form-control" name="dCategory" id="category" value="<?= $previousChosen ?>">
                                                <?php foreach (($categoryArray?:[]) as $category): ?>
                                                    <option><?= $category ?></option>
                                                <?php endforeach; ?>
                                            </select>                                            
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <button class="btn btn-lg btn-success btn-block login-button" type="submit">OK</button>
                                    </div>
                                </form>                                
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
                   
            <div class="col-sm-12">
                <div class="col-sm-8 col-sm-offset-2">
                    
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>My Submissions</h4></div>
                            <div class="panel-body">
                                
                                <!--
                                <div class="table table-responsive">
                                    <table id="job-table" class="table table-hover table-bordered"  style="color:black;">
                                        <thead>
                                            <tr>
                                                <th class='text-center'>Truths</th>
                                                <th class='text-center'>Category</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach (($truthArray?:[]) as userQuestions): ?>
                                            <tr>
                                                <td><?= $userQuestions[question] ?></td>
                                                <td><?= $userQuestions[category] ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody> 
                                    </table>
                                    
                                </div>
                            -->
                                <!--
                                <div class="table table-responsive">
                                    <table id="job-table" class="table table-hover table-bordered"  style="color:black;">
                                        <thead>
                                            <tr>
                                                <th class='text-center'>Dares</th>
                                                <th class='text-center'>Category</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach (($dareArray?:[]) as userQuestions): ?>
                                            <tr>
                                                <td><?= $userQuestions[question] ?></td>
                                                <td><?= $userQuestions[category] ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody> 
                                    </table>
                                    -->
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <button class="btn btn-lg btn-success btn-block login-button" type="submit">Go Back</button>
                </div>
                <div class="col-sm-2 col-sm-offset-8">
                    <button class="btn btn-lg btn-success btn-block login-button" type="submit">Logout</button>
                </div> 
            </div>
            
        </div>
        
    </div>
</body>