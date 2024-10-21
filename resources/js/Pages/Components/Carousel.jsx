import Carousel from 'react-bootstrap/Carousel';
import CarouselImage from '../Components/CarouselImage';

function CarouselSlider({ images, appUrl }) {
  return (
    <Carousel fade>
      <Carousel.Item>
        <CarouselImage text="First slide" appUrl={appUrl} image={ images[0] }/>
      </Carousel.Item>
      <Carousel.Item>
        <CarouselImage text="Second slide" appUrl={appUrl} image={ images[1] }/>
      </Carousel.Item>
      <Carousel.Item>
        <CarouselImage text="Third slide" appUrl={appUrl} image={ images[2] }/>
      </Carousel.Item>
    </Carousel>
  );
}

export default CarouselSlider;