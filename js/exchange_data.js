/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var mymap;
// data from server
var objects;
// filter category
var categories;
// filter event dates
var dates;

// initialize map and get first data
$( document ).ready(function() {
    console.log( "ready!" );
    mymap = L.map('mapid').setView([56.838011, 60.597465], 13); // Екатеринбург
    
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoibWl4aXoiLCJhIjoiY2p2dGt3dml2MGNjeDQzcGhvd3p0YnlpcCJ9.dVuqSZZsjy0Efu3kJUoBMQ'
    }).addTo(mymap);
    
    $('input[name="daterange"]').daterangepicker();
    // Assign handlers immediately after making the request,
    // and remember the jqXHR object for this request
    // получить данные с сервера
    prepare_data();
    get_data();

});

// get data from filters and prepare for ajax request
function prepare_data() {
    categories = [];
    jQuery("input[name='category[]']").each(function() {
        console.log( this.value + ":" + this.checked );
        if (this.checked)
          categories.push(this.value);
    });
    
    jQuery("input[name='dates']").each(function() {
        console.log( this.value );
        dates = this.value;
    });
}

// retrieve data from server
function get_data() {
    var jqxhr = $.ajax( {
            method: "POST",
            url: "server/server.php",
            data: { name: "John", location: "Boston" }
        })
      .done(function(msg) {
        // обработка пришедших данных
        
      })
}