  var $image = $(".viewer");
  $image.viewer({
    inline: false,
    rotatable:false,
    toggleOnDblclick:false,
    ratio:false,      //旋轉
    navbar:false,    //底下導航
    scalable:false,  //翻轉
    movable:false,    //移動拖拉
    toolbar: {
      zoomIn: 1,
      zoomOut: 1,
      oneToOne: 1,
      reset: 1,
      prev: 1, //關閉往1前
      play: 0, //關閉播放
      next: 1, //關閉往1後
      rotateLeft: 1,
      rotateRight: 1,
      flipHorizontal: 1,
      flipVertical: 1,
    },    
  });//圖片幻燈片