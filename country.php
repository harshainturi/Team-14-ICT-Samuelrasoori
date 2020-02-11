
<script src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<style>
.flag-text { margin-left: 10px; }
.pot{
  width:100px;
}
</style>
<select class="pot" name="country"></select>
<input type="number">
<script>
(function($) {
  $(function() {
    var isoCountries = [

      {
        id: 'AU',
        text: 'Australia'
      },

      {
        id: 'IN',
        text: 'India'
      },

    ];

    function formatCountry(country) {
      if (!country.id) {
        return country.text;
      }
      var $country = $(
        '<span class="flag-icon flag-icon-' + country.id.toLowerCase() + ' flag-icon-squared"></span>' +
        '<span class="flag-text">' + country.text + "</span>"
      );
      return $country;
    };

    //Assuming you have a select element with name country
    // e.g. <select name="name"></select>

    $("[name='country']").select2({
      placeholder: "Select a country",
      templateResult: formatCountry,
      data: isoCountries
    });


  });
});
</script>
