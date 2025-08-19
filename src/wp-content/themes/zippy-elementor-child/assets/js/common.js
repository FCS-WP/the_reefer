export function init_slick(class_name, option = "") {
  if (option == "") {
    option = {
      autoplay: 5000,
      arrows: false,
      dots: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      pauseOnHover: false,
      pauseOnFocus: false,
      infinite: true,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    }
  }
  $(class_name).slick(option);
}