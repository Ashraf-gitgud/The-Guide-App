import Nav from '../Nav/Navbar'
import Hero from '../Hero/Hero'
import Slideshow from '../Slideshow/Slideshow'
import styles from './Homepage.module.css';

function Homepage(){
  return(<>
    <Nav/>
    <Hero/>
    <div className={styles.band}>
      <h2>Best Destinations</h2>
      <p>Exploring the north's best destinations is a journey through vibrant culture, breathtaking landscapes and rich history</p>
    </div>
    <Slideshow/>
    </>
  )
}

export default Homepage;
