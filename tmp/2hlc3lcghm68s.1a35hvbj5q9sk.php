<body>
    <div class="container">
        <form action="http://mbourque.greenrivertech.net/328/TeamTruth/" method="post" class="form-horizontal">
            <div class="row">
                
                <div class="col-sm-12">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-sm-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h4>Please enter a new Truth</h4></div>
                                    <div class="panel-body"><h4>New Truth</h4>
                                        <div class="col-sm-12">
                                            
                                            <label for="inputUsername" class="sr-only">Portrait</label>
                                            <input type="text" class="form-control" name="truth" placeholder="Enter new truth"value="Enter new truth" required autofocus>
                                            
                                            <label for="category" class="sr-only">Category</label>
                                            <select class="form-control" name="categoryArray" id="category" value="<?= $previousChosen ?>">
                                                <?php foreach (($categoryArray?:[]) as $category): ?>
                                                    <option><?= $category ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <button class="btn btn-lg btn-success btn-block login-button" type="submit">OK</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button class="btn btn-lg btn-success btn-block login-button" type="submit">Cancel</button>
                                        </div>
                                        
                                    </div>
                                </div>                   
                        </div>
                        <div class="col-sm-5 col-sm-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading"><h4>Please enter a new Dare</h4></div>
                                <div class="panel-body"><h4>New Dare</h4>
                                
                                    <div class="col-sm-12">
                                        
                                        <label for="inputUsername" class="sr-only">Portrait</label>
                                        <input type="text" class="form-control" name="dare" placeholder="Enter new Dare"value="Enter new dare" required autofocus>
                                        <label for="category" class="sr-only">Category</label>
                                            <select class="form-control" name="categoryArray" id="category" value="<?= $previousChosen ?>">
                                                <?php foreach (($categoryArray?:[]) as $category): ?>
                                                    <option><?= $category ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <button class="btn btn-lg btn-success btn-block login-button" type="submit">OK</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn btn-lg btn-success btn-block login-button" type="submit">Cancel</button>
                                    </div>
                                    
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
                                    
                                    <div class="table table-responsive">
                                        <table id="job-table" class="table table-hover table-bordered"  style="color:black;">
                                            <thead>
                                                <tr>
                                                    <th class='text-center'>Truths</th>
                                                    <th class='text-center'>Category</th>
                                                    <th class='text-center'>Dares</th>
                                                    <th class='text-center'>Category</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>Stuff</td>
                                                    <td>Stuff2</td>
                                                    <td>Stuff3</td>
                                                    <td>Stuff4</td>
                                                </tr>
                                                <tr>
                                                    <td>Stuff</td>
                                                    <td>Stuff2</td>
                                                    <td>Stuff3</td>
                                                    <td>Stuff4</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Stuff</td>
                                                    <td>Stuff2</td>
                                                    <td>Stuff3</td>
                                                    <td>Stuff4</td>
                                                </tr>
                                                <tr>
                                                    <td>Stuff</td>
                                                    <td>Stuff2</td>
                                                    <td>Stuff3</td>
                                                    <td>Stuff4</td>
                                                </tr>                
                                            </tbody> 
                                        </table>                       
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
        </form>
    </div>
</body>