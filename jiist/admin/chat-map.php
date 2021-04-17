 <?php
include "timeout.php";
include "config.php";
$user_id=$_SESSION['user_id'];
$page="chat-map";
$date =date('y/m/d H:i:s');
$msg = "";
$msg_color = "red";
if (isset($_POST['submit'])) {

    $chat_message = $_POST['chat_message'];

    $sql="INSERT INTO chat (user_id,chat_message,date) VALUES ($user_id, '$chat_message' , '$date')";
    mysqli_query($conn,$sql);
}
?>
                <div class="col-md-8">
            <!-- MAP & BOX PANE -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
               <center><iframe src="https://calendar.google.com/calendar/embed?src=yogaparameswarar%40gmail.com&ctz=Asia/Calcutta" style="border: 0" width="90%" height="450" frameborder="0" scrolling="no"></iframe></center>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">

                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                  <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>

                    <div class="card-tools">
                      <span data-toggle="tooltip" title="3 New Messages" class="badge badge-warning">3</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                              data-widget="chat-pane-toggle">
                        <i class="fas fa-comments"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                      <!-- Message. Default to the left -->
					  
					  
						
					 <?php
										$user_id=$_SESSION['user_id'];
										 $sql1 = "select a.*,b.full_name,b.photo from jiier_chat a,jiier_users b where a.user_id=b.id order by id desc";
										 $result1 = mysqli_query($conn, $sql1);
                                         while ($row1 = mysqli_fetch_assoc($result1)) {

                       ?>
										<?php if ($user_id=$_SESSION['user_id']){ ?>
					        <div class="direct-chat-msg right">
                            <?php }else if { ?>
							<div class="direct-chat-msg">
                        <?php } ?>
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left"><?php echo $row1['full_name']; ?></span>
                          <span class="direct-chat-timestamp float-right"><?php echo $row1['date']; ?></span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="uploads/<?php echo $row1['photo']; ?>?<?php echo rand(); ?>" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          <?php echo $row1['chat_message']; ?>
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                    </div>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                    <div class="direct-chat-contacts">
                      <ul class="contacts-list">
					  <?php
                            $sql = "select * from jiier_users order by full_name";
							$result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>	
							 
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="uploads/<?php echo $row['photo']; ?>?<?php echo rand(); ?>">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                <?php echo $row['full_name']; ?>
                                <small class="contacts-list-date float-right"><?php echo $row['date']; ?></small>
                              </span>
                            <!--  <span class="contacts-list-msg">How have you been? I was...</span>-->
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                       
					    <?php } ?>
					   
					   
                        <!-- End Contact Item -->
                      </ul>
                      <!-- /.contacts-list -->
                    </div>
                    <!-- /.direct-chat-pane -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <form action="#" method="post">
                      <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-warning">Send</button>
                        </span>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
              </div>

                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  
                    <!-- /.panel .chat-panel -->
                </div>