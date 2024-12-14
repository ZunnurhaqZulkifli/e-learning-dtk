import Carousel from 'react-bootstrap/Carousel';
import CarouselImage from './carousel-image';

function CarouselSlider({ images, appUrl }) {
  return (
    <Carousel fade>
      {
        images ? images.map((image, index) => (
          <Carousel.Item key={index}>
            <CarouselImage text="First slide" appUrl={appUrl} image={image} />
          </Carousel.Item>
        )) : null
      }
    </Carousel>
  );
}

export default CarouselSlider;