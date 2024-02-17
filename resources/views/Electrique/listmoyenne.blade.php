<script src="https://cdn.lordicon.com/lordicon.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofNol+hCv9LXRSe++9dC5u80+6bZ1egUtW" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofNol+hCv9LXRSe++9dC5u80+6bZ1egUtW" crossorigin="anonymous">
<link href="{{ asset('assets/css/dash.css') }}" rel="stylesheet">
<script src="https://cdn.lordicon.com/lordicon.js"></script>
<style>
.custom-select-style{
    width: 350px;
    height: 40px;
    border-radius: 10px;
    color: #7f4f24;
    background-color:#fffefb; 
    border:  #7f4f24 solid 1px;
}

tbody, td, tfoot, th, thead, tr {
    border-color: inherit;
    border-style: solid;
    border-width: 0;
height: 50px;
}
    .dataTables_paginate .paginate_button:hover {
        background-color: #0056b3;
        color: white;
    }
    .dataTables_paginate {
    margin-left: -7%;
    }
    .dataTables_paginate .paginate_button.current {
        background-color: #0056b3;
        color: white;
    }
    #example_paginate .paginate_button {
    background-color: #5D9AA1;
    color: #fff;
    padding: 5px 10px;
    border: #5D9AA1 solid 1px;
    border-radius: 5px;
    margin: 5px;
    float: left;
}
#example_paginate .paginate_button.current {
    background-color: #176c60;
    border: #176c60 solid 1px;
    color: #fff;
}
#example_paginate .paginate_button :hover{
    background-color: #5D9AA1;
    color: #fff;
    padding: 5px 10px;
    border: #5D9AA1 solid 1px;
    border-radius: 5px;
    margin: 5px;
    float: left;
}
.dataTables_filter label {
    font-size: 16px;
    margin-right: -156px;
    margin-top: 23px;
    color: #048f33;
}
.p1{
  font-size: 30px;
  color: #008257;
  text-align: center;
}
p {
  font-size: 13px;
  color: #bcb187;
  text-align: center;
}
.blinking-cursor {
    font-weight: 500;
    margin-left: 4px;
    font-size: 20px;
    color: white !important;
    -webkit-animation: 1s blink step-end infinite;
    -moz-animation: 1s blink step-end infinite;
    -ms-animation: 1s blink step-end infinite;
    -o-animation: 1s blink step-end infinite;
    animation: 1s blink step-end infinite;
  }
  
  @keyframes "blink" {
    from,
    to {
      color: transparent;
    }
    50% {
      color: white;
    }
  }
  
  @-moz-keyframes blink {
    from,
    to {
      color: transparent;
    }
    50% {
      color: white;
    }
  }
  
  @-webkit-keyframes "blink" {
    from,
    to {
      color: transparent;
    }
    50% {
      color: white;
    }
  }
  
  @-ms-keyframes "blink" {
    from,
    to {
      color: transparent;
    }
    50% {
      color: white;
    }
  }
  
  @-o-keyframes "blink" {
    from,
    to {
      color: transparent;
    }
    50% {
      color: white;
    }
  }
  
</style>
@include('Electrique.layoute1')
@section('content')
<main id="main" class="main">
    <div class="card6">
        <p class="p1"><span id="holder"></span><span class="blinking-cursor">|</span></p>
        <a href="{{ route('calculations') }}" ><lord-icon
            src="https://cdn.lordicon.com/pdsourfn.json"
            trigger="hover"
            colors="primary:#43766c,secondary:#109173,tertiary:#f8fae5"
            style="width:50px;height:50px">
        </lord-icon></a>
    </div>
    <div class="card5 mt-5"> 
        <table id="example" class="table" style="width:120%">
        
            <thead class="thead-light">
                <tr>
                    <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                    <th>Tribunale</th>
                    <th>Type Cmpt</th>
                    <th>Pourcentage</th>
                    <th>Valeur</th>
                    <th>Etat </th>
                </tr>
            </thead>
            <tbody>
                @foreach($moyennes as $moyenne )
                <tr>
                <td>{{ $moyenne->date }}</td>
                <td>{{ $moyenne->tribunale->nomT }}</td>
                <td>{{ $moyenne->compteur ? $moyenne->compteur->type : 'Electrique' }}</td>
                <td>{{ $moyenne->pourcentage }}%</td>
                <td>{{ $moyenne->valeur }}</td>
                <td>
                    @if($moyenne->etat == 1)
                    <lord-icon
                    src="https://cdn.lordicon.com/jxzkkoed.json"
                    trigger="hover"
                    colors="primary:#121331,secondary:#e83a30,tertiary:#ffffff"
                    style="width:50px;height:50px">
                </lord-icon>
                    @else
                    <lord-icon
                        src="https://cdn.lordicon.com/dangivhk.json"
                        trigger="hover"
                        colors="primary:#d1faf0,secondary:#16c79e"
                        style="width:50px;height:50px">
                    </lord-icon>
                    @endif
                </td>
                </tr>
                @endforeach
            </tbody>
        
        </table>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            "order": [[2, 'desc']],
            "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                '<"row"<"col-sm-12"t>>' +
                '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            "info": false,
            "searching": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/French.json"
            }
        });

        var tribunalFilterOptions = Array.from(new Set(table.column(1).data().toArray()));
        $('#tribunalFilter').append('<option value="">Tous les tribunaux</option>');
        tribunalFilterOptions.forEach(function (option) {
            $('#tribunalFilter').append('<option value="' + option + '">' + option + '</option>');
        });

        var typeFilterOptions = Array.from(new Set(table.column(4).data().toArray()));
        $('#typeFilter').append('<option value="">Tous les types</option>');
        typeFilterOptions.forEach(function (option) {
            $('#typeFilter').append('<option value="' + option + '">' + option + '</option>');
        });

        $('#tribunalFilter').on('change', function () {
            var value = $(this).val();
            table.column(1).search(value).draw();
        });

        $('#typeFilter').on('change', function () {
            var value = $(this).val();
            table.column(4).search(value).draw();
        });
    });
</script>
    <script>
        $(document).ready(function () {
  // typing animation
  (function ($) {
    $.fn.writeText = function (content) {
      var contentArray = content.split(""),
        current = 0,
        elem = this;
      setInterval(function () {
        if (current < contentArray.length) {
          elem.text(elem.text() + contentArray[current++]);
        }
      }, 80);
    };
  })(jQuery);

  // input text for typing animation
  $("#holder").writeText("Listes des Consomations + Ajouter");

  // initialize wow.js
  new WOW().init();

  // Push the body and the nav over by 285px over
  var main = function () {
    $(".fa-bars").click(function () {
      $(".nav-screen").animate(
        {
          right: "0px"
        },
        200
      );

      $("body").animate(
        {
          right: "285px"
        },
        200
      );
    });

    // Then push them back */
    $(".fa-times").click(function () {
      $(".nav-screen").animate(
        {
          right: "-285px"
        },
        200
      );

      $("body").animate(
        {
          right: "0px"
        },
        200
      );
    });

    $(".nav-links a").click(function () {
      $(".nav-screen").animate(
        {
          right: "-285px"
        },
        500
      );

      $("body").animate(
        {
          right: "0px"
        },
        500
      );
    });
  };

  $(document).ready(main);

  // initiate full page scroll

  $("#fullpage").fullpage({
    scrollBar: true,
    responsiveWidth: 400,
    navigation: true,
    navigationTooltips: ["home", "about", "portfolio", "contact", "connect"],
    anchors: ["home", "about", "portfolio", "contact", "connect"],
    menu: "#myMenu",
    fitToSection: false,

    afterLoad: function (anchorLink, index) {
      var loadedSection = $(this);

      //using index
      if (index == 1) {
        /* add opacity to arrow */
        $(".fa-chevron-down").each(function () {
          $(this).css("opacity", "1");
        });
        $(".header-links a").each(function () {
          $(this).css("color", "white");
        });
        $(".header-links").css("background-color", "transparent");
      } else if (index != 1) {
        $(".header-links a").each(function () {
          $(this).css("color", "black");
        });
        $(".header-links").css("background-color", "white");
      }

      //using index
      if (index == 2) {
        /* animate skill bars */
        $(".skillbar").each(function () {
          $(this)
            .find(".skillbar-bar")
            .animate(
              {
                width: $(this).attr("data-percent")
              },
              2500
            );
        });
      }
    }
  });

  // move section down one
  $(document).on("click", "#moveDown", function () {
    $.fn.fullpage.moveSectionDown();
  });

  // fullpage.js link navigation
  $(document).on("click", "#skills", function () {
    $.fn.fullpage.moveTo(2);
  });

  $(document).on("click", "#projects", function () {
    $.fn.fullpage.moveTo(3);
  });

  $(document).on("click", "#contact", function () {
    $.fn.fullpage.moveTo(4);
  });

  // smooth scrolling
  $(function () {
    $("a[href*=#]:not([href=#])").click(function () {
      if (
        location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length
          ? target
          : $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
          $("html,body").animate(
            {
              scrollTop: target.offset().top
            },
            700
          );
          return false;
        }
      }
    });
  });

  //ajax form
  $(function () {
    // Get the form.
    var form = $("#ajax-contact");

    // Get the messages div.
    var formMessages = $("#form-messages");

    // Set up an event listener for the contact form.
    $(form).submit(function (e) {
      // Stop the browser from submitting the form.
      e.preventDefault();

      // Serialize the form data.
      var formData = $(form).serialize();

      // Submit the form using AJAX.
      $.ajax({
        type: "POST",
        url: $(form).attr("action"),
        data: formData
      })
        .done(function (response) {
          // Make sure that the formMessages div has the 'success' class.
          $(formMessages).removeClass("error");
          $(formMessages).addClass("success");

          // Set the message text.
          $(formMessages).text(response);

          // Clear the form.
          $("#name").val("");
          $("#email").val("");
          $("#message").val("");
        })
        .fail(function (data) {
          // Make sure that the formMessages div has the 'error' class.
          $(formMessages).removeClass("success");
          $(formMessages).addClass("error");

          // Set the message text.
          if (data.responseText !== "") {
            $(formMessages).text(data.responseText);
          } else {
            $(formMessages).text(
              "Oops! An error occured and your message could not be sent."
            );
          }
        });
    });
  });
});

    </script>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i class="bi bi-arrow-up-short"></i></a>
