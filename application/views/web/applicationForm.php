
  <!-- start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider parallax layer-overlay" data-bg-img="images/bg/bg1.jpg">
      <div class="display-table">
        <div class="display-table-cell">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-push-3">
                <div class="text-center mb-60"><a href="form-job-apply-style2.html#" class=""><img alt="" src="images/logo-wide.png"></a>
                </div>
                <div class="bg-lightest border-1px p-30 mb-0">
                  <h3 class="text-theme-colored mt-0 pt-5"> Apply Now</h3>
                  <hr>
                  <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
                  <form id="job_apply_form" name="job_apply_form" action="http://kodesolution.com/demo/nonprofit/charity/charitypress-html/v3.1/demo/includes/job.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="form_name">Mobile <small>*</small></label>
                          <input id="MOBILENUMBER" name="MOBILENUMBER" type="Number" placeholder="01xxxxxxxxx" required="required" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <span class="label alert-success">Enter Your Mobile Number</span>
                        <div class="form-group">
                          <label for="form_email">Email <small>*</small></label>
                          <input id="form_email" name="form_email" class="form-control required email" type="email" placeholder="Enter Email">
                      </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="form_name">Name <small>*</small></label>
                          <input id="form_name" name="form_name" type="text" placeholder="Enter Name" required="" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="form_sex">Batch Year <small>*</small></label>
                          <select id="  BATCHYEAR" name="  BATCHYEAR" class="form-control required">
                            <option value="">Select</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">               
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="form_sex">Gender <small>*</small></label>
                          <select id="form_sex" name="form_sex" class="form-control required">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="form_post">Job Post <small>*</small></label>
                          <select id="form_post" name="form_post" class="form-control required">
                            <option value="Finance Manager">Finance Manager</option>
                            <option value="Area Manager">Area Manager</option>
                            <option value="Country Manager">Country Manager</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="form_message">Message <small>*</small></label>
                      <textarea id="form_message" name="form_message" class="form-control required" rows="5" placeholder="Your cover letter/message sent to the employer"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="form_attachment">C/V Upload</label>
                      <input id="form_attachment" name="form_attachment" class="file" type="file" multiple data-show-upload="false" data-show-caption="true">
                      <small>Maximum upload file size: 12 MB</small>
                    </div>
                    <div class="form-group">
                      <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                      <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">Apply Now</button>
                    </div>
                  </form>
                  <!-- Job Form Validation-->
                  <script type="text/javascript">
                    $("#job_apply_form").validate({
                      submitHandler: function(form) {
                        var form_btn = $(form).find('button[type="submit"]');
                        var form_result_div = '#form-result';
                        $(form_result_div).remove();
                        form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                        var form_btn_old_msg = form_btn.html();
                        form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                        $(form).ajaxSubmit({
                          dataType:  'json',
                          success: function(data) {
                            if( data.status == 'true' ) {
                              $(form).find('.form-control').val('');
                            }
                            form_btn.prop('disabled', false).html(form_btn_old_msg);
                            $(form_result_div).html(data.message).fadeIn('slow');
                            setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                          }
                        });
                      }
                    });
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>