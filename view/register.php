
<?php
//require_once("../controller/student.php");
$registrationDetails;
$err;
?>
<div style ="clear:both"></div>
<section class="flip-box" class="container">

      <input type="radio" id="chk1" name="a1" />
      <input type="radio" id="chk2" name="a1" />

             <div class="flip-box-inner">
                    <!---Registration --->

                  <div class="flip-box-front" class="form-group">
                    <header>
                    <h2 class="title">Registration Page</h2>
                    </header>
                        <form  role="form" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method ="post"
                          enctype="multipart/form-data" class="frm">
                          <fieldset class="form-group">
                            <legend>Personal Information</legend>
                            <div ><label class="form-control" id="lblFn">First Name</label></div>
                            <div ><input class="form-control" type="text" id="txtFN" name="txtFN" maxlength="10"
                              required size="10px"/></div>
                            <div><label class="form-control">Surname</label></div>
                            <div><input class="form-control" type="text" id="txtSN" name="txtSN" required/></div>
                            <div><label class="form-control" >Date Of Birth</label></div>
                            <div><input class="form-control" type="date" id="txtDOB" name="txtDOB"/></div>
                            <div><label class="form-control">Email</label></div>
                            <div><input class="form-control" type="Email" id="txtEmail" name="txtEmail"/></div>
                            <div><label class="form-control">Password</label></div>
                            <div>
                              <input  class="form-control" type="password" id="txtPassword" name ="txtPassword"/>
                              <label><?php
                              print_r($registrationDetails);
                              if(isset($registrationDetails["Dberror"]))
                               {
                                echo $registrationDetails["Dberror"] ;
                               }

                               ?>
                            </label>
                            </div>
                            <div>
                              <label class="form-control">Country Of Origin</label>
                              <div>
                              <input list = "countries" />
                              <datalist id= "countries">
                                <option></option>
                                <option>Senegal</option>
                                <option>Togo</option>
                                <option>Niger</option>
                                <option>Nigeria</option>
                                <option>Ghana</option>
                              </datalist>
                              </div>
                            </div>
                          </fieldset>

                          <fieldset>
                           <Legend>
                           Course Information
                           </legend>
                           <div>
                            <label>Courses Available</label>
                           </div>
                           <div>
                           <select id="selectcourse">
                           <option value=""></option>
                           <option value="SWE">SoftWare Engineering</option>
                           <option value="DBT">Database Engineering</option>
                           <option value="SENG">System Engineering</option>
                           <option value="GWD">Graphics &amp; Web</option>
                           </select>
                           </div>
                           <label>Schedule</label>
                           <div>
                           <input type="radio" name = "radioSchedule" id="radioSchedule"/><label>9 AM - 11 AM </label>
                           <input type="radio"  name = "radioSchedule" id="radioSchedule"/><label>11 AM - 1 PM </label>
                           <input type="radio"  name = "radioSchedule" id="radioSchedule"/><label>1 PM - 3 PM </label>
                           <input type="radio"  name = "radioSchedule" id="radioSchedule"/><label>3 PM - 5 PM </label>
                           </div>
                           </fieldset>
                           <fieldset>
                           <legend>
                           Payment Options
                           </legend>
                           <div>
                           <label>By Cheque</label><input type="checkbox" id=chkboxCheque/>
                           <label>By MOMO </label><input type="checkbox" id="chkboxMomo"/>
                           </div>
                           </fieldset>
                            <label>Comments <?php if(isset($arrow)){echo $arrow;}?></label>
                           <div>

                               <textarea cols="50" row="10" id="txtcomment" >
                                 <?php
                                  print_r($registrationDetails["fileupload"]);
                                 ?>
                               </textarea>
                           </div>
                           <div>
                            <input type="file" id="fileld" name="fileld"/><label><?php echo $registrationDetails["imgError"]; ?></label>
                           <input class="btn btn-danger" type="button" id="btnBtn" value="Button"/>
                           <input class="btn btn-primary" type="submit" value="Send" name = "btnSend" id="btnSend"/>
                           <input class="btn btn-primary" type="reset" value="Clear" id="butClear"/>
                           </div>

                           <label class="btn btn-link" for="chk1">Login</label>
                        </form>
                        <div style="width:100px;height:80px;
                        position:absolute;top:calc(0% + 50px);left:calc(70%); border:1px solid blue">

                        <image id="loadedpic" src="" alt="student picture" style="width:100%"/>
                        <label class="btn btn-primary">Upload</label>
                        <input type="file" id="FileuploadInput" name="FileuploadInput"/>
                       </div>
                      </div>
                      <!---End of Registration --->
                      <!---Begin login --->
                      <div class="flip-box-back">
                        <form>
                            <header><h4>Login</h4></header>
                            <input type="Email" placeholder="Enter Email"/>
                            <input type="password" placeholder="Enter Password"/>
                            <input type="password" placeholder="Confirm Password"/>
                            <input class="btn btn-link" type="button" value="Login"/>
                            <label class="btn btn-primary" for="chk2">Register</label>
                        </form>
                    </div>

                    </div>
  </section>
