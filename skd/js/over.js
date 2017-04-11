wx.config({
    debug: true,
    appId: 'wx8e2ff2c5adcdbcb4',
    timestamp: 1488941073,
    nonceStr: 'ff1yNawDfbE0eUsA',
    signature: '3b871b1b0f9ab8e37ac846ba78e08dbe00681c96',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'onMenuShareAppMessage',
      'onMenuShareTimeline',
      'onMenuShareQQ',
      'onMenuShareWeibo',
      'onMenuShareQZone',
      'chooseImage',
      'previewImage',
      'uploadImage'
    ]
});

wx.ready(function () {
    wx.onMenuShareAppMessage({
      title: '斯柯达！', // 分享标题
      desc: '新车上市，赢万元大礼！！', // 分享描述
      link: 'http://leaves-ye.xin/challenge/html/send.html', // 分享链接
      imgUrl: '../img/car.png', // 分享图标
      type: '', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
      success: function () { 
		           
      },
      cancel: function () { 
          // 用户取消分享后执行的回调函数
          alert("取消成功！");
      }
    });
    wx.onMenuShareTimeline({
        title: '斯柯达！', // 分享标题
        link: 'http://leaves-ye.xin/challenge/html/send.html', // 分享链接
        imgUrl: '../img/car.png', // 分享图标
        success: function () { 
            // 用户确认分享后执行的回调函数
            over.style.display = "none";
            var randNum = rand(0,10);
            if(randNum <= 3 || randNum > 7){              
              winning.style.display = "block";
            }else{
              not_winning.style.display = "block";
            }
        },
        cancel: function () { 
            // 用户取消分享后执行的回调函数
            alert("取消成功！");
        }
    });
    wx.onMenuShareQQ({
      title: '斯柯达！', // 分享标题
      desc: '新车上市，赢万元大礼！！', // 分享描述
      link: 'http://leaves-ye.xin/challenge/html/send.html', // 分享链接
      imgUrl: '../img/car.png', // 分享图标
      success: function () { 
         // 用户确认分享后执行的回调函数
         alert("分享成功！");
      },
      cancel: function () { 
         // 用户取消分享后执行的回调函数
         alert("取消成功！");
      }
    });
    wx.chooseImage({
      count: 1, // 默认9
      sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
      sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
      success: function (res) {
          var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
      }
    });		    
});