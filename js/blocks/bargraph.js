var echartBar = echarts.init(document.getElementById('mainb'), echart_theme);

      echartBar.setOption({
        title: {
          text: '',
          subtext: ''
        },
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          data: ['2001', '2015']
        },
        toolbox: {
          show: false
        },
        calculable: false,
        xAxis: [{
          type: 'category',
          data: ['coal', 'nat.gas', 'nuclear']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: '2001',
          type: 'bar',
          data: [1903.955, 639.129, 768.826],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }, {
          name: '2015',
          type: 'bar',
          data: [1352.145, 1330.834, 797.177],
          markPoint: {
            data: [{
              name: '2001',
              value: 182.2,
              xAxis: 7,
              yAxis: 183,
            }, {
              name: '2015',
              value: 2.3,
              xAxis: 11,
              yAxis: 3
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }]
      });

////////////////////////////////////////////////	  
	  
	  var echartBar2 = echarts.init(document.getElementById('mainb2'), echart_theme);

      echartBar2.setOption({
        title: {
          text: '',
          subtext: ''
        },
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          data: ['2001', '2015']
        },
        toolbox: {
          show: false
        },
        calculable: false,
        xAxis: [{
          type: 'category',
          data: ['wind', 'solar', 'hydroE']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: '2001',
          type: 'bar',
          data: [6.737, 0.542, 216.961],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }, {
              type: 'min',
              name: 'min'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }, {
          name: '2015',
          type: 'bar',
          data: [190.617, 7.456, 246.331],
          markPoint: {
            data: [{
              name: '2001',
              value: 182.2,
              xAxis: 7,
              yAxis: 183,
            }, {
              name: '2015',
              value: 2.3,
              xAxis: 11,
              yAxis: 3
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }]
      });