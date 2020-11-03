window.addEventListener('load', function () {
    var url = myScript.script_directory;
  	console.log(url+"/plugin_soda_ux/scripts/get_stats.php");
    
     console.log("xml création");
    var xmlhttpgraphs = new XMLHttpRequest();
  	xmlhttpgraphs.open("GET", url+"/plugin_soda_ux/scripts/get_stats.php", true);
    xmlhttpgraphs.send();
     xmlhttpgraphs.onreadystatechange = function () {
     if(this.readyState == 4 && this.status == 200)
     {
       console.log("entrée ajax")
        var ladata =JSON.parse(this.responseText);
       const get_stats = document.querySelector(".get_stats"),
       content = document.querySelector(".lesvalues"); 
 Object.keys(ladata[0]).length;
 var lesvalues = []; //Objet à afficher sur jscharting
 for (let i = 0; i < 7 ; i++) {
 console.log(Object.keys(ladata[0])[i]);
 console.log(Object.values(ladata[0])[i]);
   lesvalues.push({
      x: Object.keys(ladata[0])[i],
      y: parseFloat(Object.values(ladata[0])[i]) * 100,
    marker_type: ''
   })
 }
 console.log("lesvalues", lesvalues);
     }
     else{
       console.log("raté")
   }
  
var INTERVAL_ID, 
  chart = JSC.chart('chartDiv', {  

    debug: false, 
    type: 'gauge ', 
    legend: { position: 'bottom' }, 
    animation_duration: 400, 
    //Spacing between circular bars 
    xAxis_spacingPercentage: 0.1, 
    yAxis: { 
      line_width: 0, 
      scale_range: [0, 100] 
    }, 
  
    defaultSeries: { 
      type: 'column roundCaps', 
      angle: { sweep: 360, start: -90 }, 
      shape_innerSize: '30%'
    }, 
    defaultTooltip_visible: false, 
    series: [ 
      { 
        palette: [ // couleurs présentes sur le graphe 1
          '#0f3057', 
          '#00587a', 
          '#008891'
        ], 
        name: 'Activities', 
        defaultPoint: { 
          marker: { 
            //Outline makes the markers thicker without making them larger 
            outline: { width: 0, color: 'white' }, 
            visible: false, 
            size: 17 
          } 
        }, 
        points: [ // cordonnées des points pour la construction du premier graphe
          { 
            x:lesvalues[0].x ,
            y: lesvalues[0].y, 
            
          }, 
          { 
            x: lesvalues[1].x, 
            y: lesvalues[1].y, 
            
          }, 
          { 
            x: lesvalues[2].x,  
            y: lesvalues[2].y, 
            
          } //material/maps/hotel 
        ] 
      } 
    ], 
    
  }); 


var INTERVAL, 
chart = JSC.chart('chartD', { 
  debug: false, 
  type: 'gauge ', 

  legend: { position: 'bottom' }, 
  animation_duration: 400, 
  //Spacing between circular bars 
  xAxis_spacingPercentage: 0.1, 
  yAxis: { 
    line_width: 0, 
    scale_range: [0, 100] 
  }, 

  defaultSeries: { 
    type: 'column roundCaps', 
    angle: { sweep: 360, start: -90 }, 
    shape_innerSize: '30%',
  }, 
  defaultTooltip_visible: false, 
  series: [ 
    { 
      palette: [ // couleurs du graphe 2
        '#363062', 
        '#4d4c7d', 
        '#827397',
		    '#d8b9c3'
      ], 
      name: 'Activities', 
      defaultPoint: { 
        marker: { 
			fill: '#F8F8F8',
          //Outline makes the markers thicker without making them larger 
          outline: { width: 0, color: 'white' }, 
		
          visible: false, 
          size: 17 
        } 
      }, 
      points: [ // cordonnées des points pour la construction du deuxieme graphe
        { 
          x:lesvalues[3].x ,
          y: lesvalues[3].y, 
         
        }, 
        { 
          x: lesvalues[4].x,
          y: lesvalues[4].y, 
         
        }, 
        { 
          x: lesvalues[5].x,
          y: lesvalues[5].y, 
          
        } ,
		   { 
          x: lesvalues[6].x,
          y: lesvalues[6].y, 
          
        } //material/maps/hotel 
      ] 
    } 
  ], 

}); 
}
});
