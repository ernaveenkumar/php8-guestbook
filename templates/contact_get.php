<section>
  <h2>Leave a Public Note/Question</h2>
  
  <div class="row">
    <div class="col">
    <form method="POST">
      <!-- CSRF -->
       <input type="hidden" name="csrf_token" value="<?php echo $data['csrfToken']; ?>" />

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name = "name" aria-describedby="nameHelp">
        <div id="nameHelp" class="form-text"></div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="text" class="form-control" id="email" name = "email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <textarea class="form-control" placeholder="Leave a message here" id="message" name = "message" style="height: 100px"></textarea>
        <label for="message">Message</label>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>


</section>