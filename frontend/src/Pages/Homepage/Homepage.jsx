import Hero from '../../Components/Hero/Hero'
import Slideshow from '../../Components/Slideshow/Slideshow'
import styles from './Homepage.module.css'
import Attractions from '../../Components/Attractions/Attractions'
import DoubleCarousel from '../../Components/DoubleCarousel/DoubleCarousel'


function Homepage(){
  return(<>
    <Hero/>
    <div className={styles.band}>
      <h2>Many Destinations</h2>
      <p>Exploring the north's best destinations is a journey through vibrant culture, breathtaking landscapes and rich history</p>
    </div>
    <Slideshow/>
    <Attractions/>
    <DoubleCarousel/>
    </>
  )
}

export default Homepage;
