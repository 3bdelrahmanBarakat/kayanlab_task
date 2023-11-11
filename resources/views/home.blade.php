

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{asset('assets/css/style2.css')}}">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KyanLabs</title>
</head>

<body>
    <div class="container">
      <div class="navbar">
        <img src="{{asset('assets/Images/pngegg.png')}}" alt="Logo">
        <form action="{{route('logout')}}" method="POST">
           @csrf
                <button class="no-style" type="submit">
                    <img src="{{asset('assets/Images/logout-32.png')}}" alt="Logout" style="cursor: pointer;">
                </button>
        </form>
      </div>
      <div class="welcome-message">
        Welcome, {{$user->first_name}} {{$user->last_name}}!
      </div>

      <div class="sections-container">
        <div class="section-card user-info">
            <img src="{{$user->photo}}" alt="Profile Image" width="100" height="120">
            <div>
              <p><i class="fas fa-envelope"></i> {{$user->email}}</p>
              <p><i class="fab fa-twitter-square"></i> {{$user->username}}</p>
            </div>
          </div>

          <div class="section-card twitter-section">
            <div class="loading-spinner"></div>
            <a class="twitter-timeline" data-width="300" data-height="200" href="https://twitter.com/{{$user->username}}"
              data-tweet-limit="5"></a>
          </div>
      </div>

      <div class="section-card feedback-form">
        <form id="feedbackForm">
            @csrf
          <label>Is this your account?</label>
          <div class="radio-group">
            <label>
              <input type="radio" name="valid_twitter_account" value="1" onclick="toggleTextarea(false)"> Yes
            </label>
            <label>
              <input type="radio" name="valid_twitter_account" value="0" onclick="toggleTextarea(true)"> No
            </label>
          </div>

          <textarea name="feedback_text" id="review" placeholder="Write your feedback here..."></textarea>
          <button type="button" onclick="submitFeedback()" class="submit-btn">Submit</button>
        </form>

        <div id="feedbackContainer">
        </div>
      </div>
    </div>

    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>


    <script>
        function submitFeedback() {
    var formData = $('#feedbackForm').serialize();

    $.ajax({
        type: 'POST',
        url: '{{ route('feedback.submit') }}',
        data: formData,
        success: function(response) {
            $('#feedbackForm')[0].reset();
            Swal.fire({
                icon: 'success',
                title: 'Feedback Submitted!',
            });


            if (response.message && response.message.trim() !== "") {

        return $('#feedbackContainer').html('<p>' + response.message + '</p>');
                } else {
                    return $('#feedbackContainer').html('<p>' + ''+ '</p>');
                }


        },


        error: function(error) {

            if (error.responseJSON && error.responseJSON.errors) {
                    // Display validation errors in #feedbackContainer
                    var errorsHtml = '<ul>';
                    $.each(error.responseJSON.errors, function(key, value) {
                        errorsHtml += '<li style="color: red">' + value + '</li>';
                    });
                    errorsHtml += '</ul>';
                    $('#feedbackContainer').html(errorsHtml);
                } else {
                    console.error(error);
                }

        }
    });
}


    </script>
  </body>
  </html>
