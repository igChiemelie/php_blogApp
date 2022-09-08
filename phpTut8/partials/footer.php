<!-- Modal Structure -->
<div id="regModal" class="modal">
        <div class="modal-content">
            <div class="card" id="loginCard">
                <div class="card-content">
                <h4>Login</h4>
                    <div class="row">
                        <form class="col s12" id="loginForm" action="server/gateway.php" method="POST">
                            <div class="input-field col s6">
                                <input id="loginEmail" name="loginEmail"  placeholder="Email" type="email" class="validate">
                                <label for="loginEmail">Email</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="loginPassword" name="loginPassword" placeholder="Password" type="password" class="validate">
                                <label for="loginPassword">Password</label>
                            </div>
                            <div class="input-field col s12 center-align">
                                <button class="btn waves-effect waves-light" type="submit" name="banye">Login
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                        <p class="center-align">Do not have an Account? <a href="#" id="goToReg">Sign Up</a></p>
                    </div>
                </div>
            </div>
            

            <div class="card hide" id="regCard">
                <div class="card-content">
                    <h4>Create Account</h4>
                    <div class="row">
                        <form id="regForm" class="col s12" action="server/gateway.php" method="POST">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input placeholder="Firstname" required name="firstName" id="firstName" type="text" class="validate">
                                    <label for="firstName">First Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Lastname" required id="lastName" name="lastName" type="text" class="validate">
                                    <label for="lastName">Last Name</label>
                                </div>
                                
                                <div class="input-field col s6">
                                    <input name="otherName" id="otherName" placeholder="Othername" type="text">
                                    <label for="otherName">Other Name</label>
                                </div>
                                
                                <div class="input-field col s6">
                                    <input id="password" name="password" required placeholder="Password" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>

                                <div class="input-field col s6">
                                    <input id="cPassword" name="cPassword" required placeholder="Confirm Password" type="password" class="validate">
                                    <label for="cPassword">Confirm Password</label>
                                </div>
                                
                                <div class="input-field col s6">
                                    <input id="email" name="email" required placeholder="Email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s6">
                                    <p class="col s4">
                                        <b>Gender: </b>
                                    </p>
                                    <p class="col s4">
                                        <label>
                                            <input required name="gender" type="radio" value="M" />
                                            <span>Male</span>
                                        </label>
                                    </p>
                                    <p class="col s4">
                                        <label>
                                            <input required name="gender" type="radio" value="F"/>
                                            <span>Female</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="input-field col s6">
                                    <select name="state" id="state">
                                        <option value="">Select State</option>
                                        <?php
                                            // DB Connection
                                            require '../phpTutsDBConfig.php';

                                            //Query DB for all state......$res
                                            $res = $db->query('SELECT * FROM states');
                                            //Get the num of rows returned.....$numRws
                                            $numRws = $res->num_rows;

                                            //if $numRws > 0
                                            if($numRws > 0){
                                                //loop thru $res 
                                                while($row = $res->fetch_assoc()){
                                                    //echo each state with its id like this:
                                                    $stateId = $row['id'];
                                                    $state = $row['state'];
                                                    //<option value="$id">$stateName</option>
                                                    echo'<option value="'.$stateId.'">'.$state.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                    <label>State of Origin</label>
                                </div>
                                <div class="input-field col s12 center-align">
                                    <button class="btn waves-effect waves-light" type="submit" name="debanye">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="center-align">Have an Account? <a href="#" id="goToLogin">Login</a></p>
                    </div>
                </div>
            </div>
            
        </div>        
    </div>
  <footer class="page-footer">
          
          <div class="footer-copyright">
            <div class="container">
            &copy; 2013- <?php  $today = date("Y");  echo  $today ?> Copyright <i><b> igc@gmail.com </b></i>

            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/jbTut.js"></script>    
</body>
</html>