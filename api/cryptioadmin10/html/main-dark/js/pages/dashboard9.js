//[Dashboard Javascript]

//Project:	Crypto Tokenizer UI Interface & Cryptocurrency Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

	window.Apex = {
      stroke: {
        width: 3
      },
      markers: {
        size: 0
      },
      tooltip: {
        fixed: {
          enabled: true,
        }
      }
    };
    
    var randomizeArray = function (arg) {
      var array = arg.slice();
      var currentIndex = array.length,
        temporaryValue, randomIndex;

      while (0 !== currentIndex) {

        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
      }

      return array;
    }

    // data for the sparklines that appear below header area
    var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46];

    var spark1 = {
      chart: {
        type: 'area',
        height: 120,
		foreColor: '#8a99b5',
        sparkline: {
          enabled: true
        },
      },
      stroke: {
        curve: 'smooth'
      },
      fill: {
        opacity: 0,
        type: 'solid',
		gradient: {
		  gradientToColors: ['#689f38']
		},
      },
      series: [{
        data: randomizeArray(sparklineData)
      }],
		labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
      yaxis: {
        min: 0
      },
	  xaxis: {
		type: 'datetime',
	  },
      colors: ['#e2bb33'],
		tooltip: {
			theme: 'dark'
  		},
    }
	
	var spark2 = {
      chart: {
        type: 'area',
        height: 120,
        sparkline: {
          enabled: true
        },
      },
      stroke: {
        curve: 'smooth'
      },
      fill: {
        opacity: 0,
        type: 'solid',
		gradient: {
		  gradientToColors: ['#ff8f00', '#ff8f00']
		},
      },
      series: [{
        data: randomizeArray(sparklineData)
      }],
	  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
      yaxis: {
        min: 0
      },
	  xaxis: {
		type: 'datetime',
	  },
      colors: ['#ff8f00'],
		tooltip: {
			theme: 'dark'
  		},
    };
	
	 var spark3 = {
      chart: {
        type: 'area',
        height: 120,
        sparkline: {
          enabled: true
        },
      },
      stroke: {
        curve: 'smooth'
      },
      fill: {
        opacity: 0,
        type: 'solid',
		gradient: {
		  gradientToColors: ['#ee1044', '#ee1044']
		},
      },
      series: [{
        data: randomizeArray(sparklineData)
      }],
	  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
	  xaxis: {
		type: 'datetime',
	  },
      yaxis: {
        min: 0
      },
      colors: ['#ee1044'],
		tooltip: {
			theme: 'dark'
  		},
    };
	
	
	
	var spark1 = new ApexCharts(document.querySelector("#spark1"), spark1);
    spark1.render();
	var spark2 = new ApexCharts(document.querySelector("#spark2"), spark2);
    spark2.render();
    var spark3 = new ApexCharts(document.querySelector("#spark3"), spark3);
    spark3.render();
	
	
	
	
	var options = {
      annotations: {
        yaxis: [{
          y: 30,
          borderColor: '#999',
          label: {
            show: true,
            text: 'Support',
            style: {
              color: "#fff",
              background: '#00E396'
            }
          }
        }],
        xaxis: [{
          x: new Date('14 Nov 2012').getTime(),
          borderColor: '#999',
          yAxisIndex: 0,
          label: {
            show: true,
            text: 'Rally',
            style: {
              color: "#fff",
              background: '#775DD0'
            }
          }
        }]
      },
      chart: {
        type: 'area',
        height: 400,
		foreColor: '#8a99b5',
      },
      dataLabels: {
        enabled: false
      },
      series: [{
          data: [
            [1327359600000,30.95],
            [1327446000000,31.34],
            [1327532400000,31.18],
            [1327618800000,31.05],
            [1327878000000,31.00],
            [1327964400000,30.95],
            [1328050800000,31.24],
            [1328137200000,31.29],
            [1328223600000,31.85],
            [1328482800000,31.86],
            [1328569200000,32.28],
            [1328655600000,32.10],
            [1328742000000,32.65],
            [1328828400000,32.21],
            [1329087600000,32.35],
            [1329174000000,32.44],
            [1329260400000,32.46],
            [1329346800000,32.86],
            [1329433200000,32.75],
            [1329778800000,32.54],
            [1329865200000,32.33],
            [1329951600000,32.97],
            [1330038000000,33.41],
            [1330297200000,33.27],
            [1330383600000,33.27],
            [1330470000000,32.89],
            [1330556400000,33.10],
            [1330642800000,33.73],
            [1330902000000,33.22],
            [1330988400000,31.99],
            [1331074800000,32.41],
            [1331161200000,33.05],
            [1331247600000,33.64],
            [1331506800000,33.56],
            [1331593200000,34.22],
            [1331679600000,33.77],
            [1331766000000,34.17],
            [1331852400000,33.82],
            [1332111600000,34.51],
            [1332198000000,33.16],
            [1332284400000,33.56],
            [1332370800000,33.71],
            [1332457200000,33.81],
            [1332712800000,34.40],
            [1332799200000,34.63],
            [1332885600000,34.46],
            [1332972000000,34.48],
            [1333058400000,34.31],
            [1333317600000,34.70],
            [1333404000000,34.31],
            [1333490400000,33.46],
            [1333576800000,33.59],
            [1333922400000,33.22],
            [1334008800000,32.61],
            [1334095200000,33.01],
            [1334181600000,33.55],
            [1334268000000,33.18],
            [1334527200000,32.84],
            [1334613600000,33.84],
            [1334700000000,33.39],
            [1334786400000,32.91],
            [1334872800000,33.06],
            [1335132000000,32.62],
            [1335218400000,32.40],
            [1335304800000,33.13],
            [1335391200000,33.26],
            [1335477600000,33.58],
            [1335736800000,33.55],
            [1335823200000,33.77],
            [1335909600000,33.76],
            [1335996000000,33.32],
            [1336082400000,32.61],
            [1336341600000,32.52],
            [1336428000000,32.67],
            [1336514400000,32.52],
            [1336600800000,31.92],
            [1336687200000,32.20],
            [1336946400000,32.23],
            [1337032800000,32.33],
            [1337119200000,32.36],
            [1337205600000,32.01],
            [1337292000000,31.31],
            [1337551200000,32.01],
            [1337637600000,32.01],
            [1337724000000,32.18],
            [1337810400000,31.54],
            [1337896800000,31.60],
            [1338242400000,32.05],
            [1338328800000,31.29],
            [1338415200000,31.05],
            [1338501600000,29.82],
            [1338760800000,30.31],
            [1338847200000,30.70],
            [1338933600000,31.69],
            [1339020000000,31.32],
            [1339106400000,31.65],
            [1339365600000,31.13],
            [1339452000000,31.77],
            [1339538400000,31.79],
            [1339624800000,31.67],
            [1339711200000,32.39],
            [1339970400000,32.63],
            [1340056800000,32.89],
            [1340143200000,31.99],
            [1340229600000,31.23],
            [1340316000000,31.57],
            [1340575200000,30.84],
            [1340661600000,31.07],
            [1340748000000,31.41],
            [1340834400000,31.17],
            [1340920800000,32.37],
            [1341180000000,32.19],
            [1341266400000,32.51],
            [1341439200000,32.53],
            [1341525600000,31.37],
            [1341784800000,30.43],
            [1341871200000,30.44],
            [1341957600000,30.20],
            [1342044000000,30.14],
            [1342130400000,30.65],
            [1342389600000,30.40],
            [1342476000000,30.65],
            [1342562400000,31.43],
            [1342648800000,31.89],
            [1342735200000,31.38],
            [1342994400000,30.64],
            [1343080800000,30.02],
            [1343167200000,30.33],
            [1343253600000,30.95],
            [1343340000000,31.89],
            [1343599200000,31.01],
            [1343685600000,30.88],
            [1343772000000,30.69],
            [1343858400000,30.58],
            [1343944800000,32.02],
            [1344204000000,32.14],
            [1344290400000,32.37],
            [1344376800000,32.51],
            [1344463200000,32.65],
            [1344549600000,32.64],
            [1344808800000,32.27],
            [1344895200000,32.10],
            [1344981600000,32.91],
            [1345068000000,33.65],
            [1345154400000,33.80],
            [1345413600000,33.92],
            [1345500000000,33.75],
            [1345586400000,33.84],
            [1345672800000,33.50],
            [1345759200000,32.26],
            [1346018400000,32.32],
            [1346104800000,32.06],
            [1346191200000,31.96],
            [1346277600000,31.46],
            [1346364000000,31.27],
            [1346709600000,31.43],
            [1346796000000,32.26],
            [1346882400000,32.79],
            [1346968800000,32.46],
            [1347228000000,32.13],
            [1347314400000,32.43],
            [1347400800000,32.42],
            [1347487200000,32.81],
            [1347573600000,33.34],
            [1347832800000,33.41],
            [1347919200000,32.57],
            [1348005600000,33.12],
            [1348092000000,34.53],
            [1348178400000,33.83],
            [1348437600000,33.41],
            [1348524000000,32.90],
            [1348610400000,32.53],
            [1348696800000,32.80],
            [1348783200000,32.44],
            [1349042400000,32.62],
            [1349128800000,32.57],
            [1349215200000,32.60],
            [1349301600000,32.68],
            [1349388000000,32.47],
            [1349647200000,32.23],
            [1349733600000,31.68],
            [1349820000000,31.51],
            [1349906400000,31.78],
            [1349992800000,31.94],
            [1350252000000,32.33],
            [1350338400000,33.24],
            [1350424800000,33.44],
            [1350511200000,33.48],
            [1350597600000,33.24],
            [1350856800000,33.49],
            [1350943200000,33.31],
            [1351029600000,33.36],
            [1351116000000,33.40],
            [1351202400000,34.01],
            [1351638000000,34.02],
            [1351724400000,34.36],
            [1351810800000,34.39],
            [1352070000000,34.24],
            [1352156400000,34.39],
            [1352242800000,33.47],
            [1352329200000,32.98],
            [1352415600000,32.90],
            [1352674800000,32.70],
            [1352761200000,32.54],
            [1352847600000,32.23],
            [1352934000000,32.64],
            [1353020400000,32.65],
            [1353279600000,32.92],
            [1353366000000,32.64],
            [1353452400000,32.84],
            [1353625200000,33.40],
            [1353884400000,33.30],
            [1353970800000,33.18],
            [1354057200000,33.88],
            [1354143600000,34.09],
            [1354230000000,34.61],
            [1354489200000,34.70],
            [1354575600000,35.30],
            [1354662000000,35.40],
            [1354748400000,35.14],
            [1354834800000,35.48],
            [1355094000000,35.75],
            [1355180400000,35.54],
            [1355266800000,35.96],
            [1355353200000,35.53],
            [1355439600000,37.56],
            [1355698800000,37.42],
            [1355785200000,37.49],
            [1355871600000,38.09],
            [1355958000000,37.87],
            [1356044400000,37.71],
            [1356303600000,37.53],
            [1356476400000,37.55],
            [1356562800000,37.30],
            [1356649200000,36.90],
            [1356908400000,37.68],
            [1357081200000,38.34],
            [1357167600000,37.75],
            [1357254000000,38.13],
            [1357513200000,37.94],
            [1357599600000,38.14],
            [1357686000000,38.66],
            [1357772400000,38.62],
            [1357858800000,38.09],
            [1358118000000,38.16],
            [1358204400000,38.15],
            [1358290800000,37.88],
            [1358377200000,37.73],
            [1358463600000,37.98],
            [1358809200000,37.95],
            [1358895600000,38.25],
            [1358982000000,38.10],
            [1359068400000,38.32],
            [1359327600000,38.24],
            [1359414000000,38.52],
            [1359500400000,37.94],
            [1359586800000,37.83],
            [1359673200000,38.34],
            [1359932400000,38.10],
            [1360018800000,38.51],
            [1360105200000,38.40],
            [1360191600000,38.07],
            [1360278000000,39.12],
            [1360537200000,38.64],
            [1360623600000,38.89],
            [1360710000000,38.81],
            [1360796400000,38.61],
            [1360882800000,38.63],
            [1361228400000,38.99],
            [1361314800000,38.77],
            [1361401200000,38.34],
            [1361487600000,38.55],
            [1361746800000,38.11],
            [1361833200000,38.59],
            [1361919600000,39.60],
          ]
        },

      ],
	  colors: ['#e2bb33'],
      markers: {
        size: 0,
        style: 'hollow',
      },
		grid: {
			borderColor: '#566f9e',    
		},
      xaxis: {
        type: 'datetime',
        min: new Date('01 Mar 2012').getTime(),
        tickAmount: 6,
      },
      tooltip: {
        x: {
          format: 'dd MMM yyyy'
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shadeIntensity: 1,
          opacityFrom: 0.7,
          opacityTo: 0.9,
          stops: [0, 100]
        }
      },

    }

    var chart = new ApexCharts(
      document.querySelector("#timeline-chart"),
      options
    );

    chart.render();
	
	
	
	
	
	
	
	
	
	
	
	
	
	am4core.ready(function() {

	// Themes begin
	am4core.useTheme(am4themes_kelly);
	am4core.useTheme(am4themes_dark);
	am4core.useTheme(am4themes_animated);
	// Themes end

	// Create chart instance
	var chart = am4core.create("bitcoin-timeline", am4charts.XYChart);

	// Add data
	chart.data = [{
	  "x": "1",
	  "y": 1,
	  "text": "[bold]2018 Q1[/]\nThere seems to be some furry animal living in the neighborhood.",
	  "center": "bottom"
	}, {
	  "x": "2",
	  "y": 1,
	  "text": "[bold]2018 Q2[/]\nWe're now mostly certain it's a fox.",
	  "center": "top"
	}, {
	  "x": "3",
	  "y": 1,
	  "text": "[bold]2018 Q3[/]\nOur dog does not seem to mind the newcomer at all.",
	  "center": "bottom"
	}, {
	  "x": "4",
	  "y": 1,
	  "text": "[bold]2018 Q4[/]\nThe quick brown fox jumps over the lazy dog.",
	  "center": "top"
	}];

	// Create axes
	var xAxis = chart.xAxes.push(new am4charts.CategoryAxis());
	xAxis.dataFields.category = "x";
	xAxis.renderer.grid.template.disabled = true;
	xAxis.renderer.labels.template.disabled = true;
	xAxis.tooltip.disabled = true;

	var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
	yAxis.min = 0;
	yAxis.max = 1.99;
	yAxis.renderer.grid.template.disabled = true;
	yAxis.renderer.labels.template.disabled = true;
	yAxis.renderer.baseGrid.disabled = true;
	yAxis.tooltip.disabled = true;


	// Create series
	var series = chart.series.push(new am4charts.LineSeries());
	series.dataFields.categoryX = "x";
	series.dataFields.valueY = "y";
	series.strokeWidth = 4;
	series.sequencedInterpolation = true;

	var bullet = series.bullets.push(new am4charts.CircleBullet());
	bullet.setStateOnChildren = true;
	bullet.states.create("hover");
	bullet.circle.radius = 10;
	bullet.circle.states.create("hover").properties.radius = 15;

	var labelBullet = series.bullets.push(new am4charts.LabelBullet());
	labelBullet.setStateOnChildren = true;
	labelBullet.states.create("hover").properties.scale = 1.2;
	labelBullet.label.text = "{text}";
	labelBullet.label.maxWidth = 150;
	labelBullet.label.wrap = true;
	labelBullet.label.truncate = false;
	labelBullet.label.textAlign = "middle";
	labelBullet.label.paddingTop = 20;
	labelBullet.label.paddingBottom = 20;
	labelBullet.label.fill = am4core.color("#999");
	labelBullet.label.states.create("hover").properties.fill = am4core.color("#000");

	labelBullet.label.propertyFields.verticalCenter = "center";


	chart.cursor = new am4charts.XYCursor();
	chart.cursor.lineX.disabled = true;
	chart.cursor.lineY.disabled = true;

	}); // end am4core.ready()
	
	
	
	
	
	
	
	
	
	
	
	am4core.ready(function() {

	// Themes begin
	am4core.useTheme(am4themes_dark);
	am4core.useTheme(am4themes_animated);
	// Themes end

	// create chart
	var chart = am4core.create("userflow", am4charts.GaugeChart);
	chart.innerRadius = am4core.percent(82);

	/**
	 * Normal axis
	 */

	var axis = chart.xAxes.push(new am4charts.ValueAxis());
	axis.min = 0;
	axis.max = 100;
	axis.strictMinMax = true;
	axis.renderer.radius = am4core.percent(80);
	axis.renderer.inside = false;
	axis.renderer.line.strokeOpacity = 1;
	axis.renderer.ticks.template.strokeOpacity = 1;
	axis.renderer.ticks.template.length = 10;
	axis.renderer.grid.template.disabled = true;
	axis.renderer.labels.template.radius = 50;
	axis.renderer.labels.template.adapter.add("text", function(text) {
	  return text + "%";
	})

	/**
	 * Axis for ranges
	 */

	var colorSet = new am4core.ColorSet();

	var axis2 = chart.xAxes.push(new am4charts.ValueAxis());
	axis2.min = 0;
	axis2.max = 100;
	axis2.renderer.innerRadius = 10
	axis2.strictMinMax = true;
	axis2.renderer.labels.template.disabled = true;
	axis2.renderer.ticks.template.disabled = true;
	axis2.renderer.grid.template.disabled = true;

	var range0 = axis2.axisRanges.create();
	range0.value = 0;
	range0.endValue = 50;
	range0.axisFill.fillOpacity = 1;
	range0.axisFill.fill = colorSet.getIndex(0);

	var range1 = axis2.axisRanges.create();
	range1.value = 50;
	range1.endValue = 100;
	range1.axisFill.fillOpacity = 1;
	range1.axisFill.fill = colorSet.getIndex(2);

	/**
	 * Label
	 */

	var label = chart.radarContainer.createChild(am4core.Label);
	label.isMeasured = false;
	label.fontSize = 18;
	label.x = am4core.percent(50);
	label.y = am4core.percent(100);
	label.horizontalCenter = "middle";
	label.verticalCenter = "bottom";
	label.text = "10%";


	/**
	 * Hand
	 */

	var hand = chart.hands.push(new am4charts.ClockHand());
	hand.axis = axis2;
	hand.innerRadius = am4core.percent(20);
	hand.startWidth = 10;
	hand.pin.disabled = true;
	hand.value = 50;

	hand.events.on("propertychanged", function(ev) {
	  range0.endValue = ev.target.value;
	  range1.value = ev.target.value;
	  axis2.invalidate();
	});

	setInterval(() => {
	  var value = Math.round(Math.random() * 100);
	  label.text = value + "%";
	  var animation = new am4core.Animation(hand, {
		property: "value",
		to: value
	  }, 1000, am4core.ease.cubicOut).start();
	}, 2000);

	}); // end am4core.ready()
	
	
  
		
}); // End of use strict
