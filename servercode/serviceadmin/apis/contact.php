
            <form action="mailsend.php" method="post" class="php-email-form-1">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="" data-msg="Please enter name" required />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="" data-msg="Please enter a valid email" required />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" data-rule="" data-msg="Please enter valid phone no" required />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="query" rows="5" data-rule="" data-msg="Please write something for us" placeholder="Message/Query" required ></textarea>
                <div class="validate"></div>
              </div>
              <!--
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              -->
              <div class="text-center"><button name="submit" type="submit" class="btn-submit">Send</button></div>
            </form>