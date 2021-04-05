var Drupal = Drupal || {};

(function ($, Drupal, drupalSettings) {

  'use strict';
  $(function () {

    // Variable for Node ID
    let nid = drupalSettings.path.currentPath.substr(drupalSettings.path.currentPath.length - 1);

    $('.test-button').click(function() {

      $.ajax({
        url: "/api/accessibility/" + nid,
        type: "GET",
        success: function(data) {

          let response = JSON.parse(data.data);

          // Get accessibility violations
          let violations = [];
          let i;
          for (i = 0; i < response.violations.length; i++) {
            if(response.violations[i].nodes.length <= 2) {
              violations.push("<p class='good'>" + response.violations[i].id + " : " + response.violations[i].nodes.length + "</p>");
            } else {
              violations.push("<p class='bad'>" + response.violations[i].id + " : " + response.violations[i].nodes.length + "</p>");
            }
          }

          $( ".accessibility-results" ).append( violations );
        }
      })
    });

  });

})(jQuery, Drupal, drupalSettings);
