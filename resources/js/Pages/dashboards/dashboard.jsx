import CarouselSlider from '../components/carousel';
import CoursesStats from '../components/courses-stats';
import CoursesCatalogue from './dashboard-catalogue';
import MasterLayout from '../master-layout';

export default function Dashboard({ user, courses, stats, images, appUrl, userRoles }) {
  
  function renderView(userRoles) {
    switch(userRoles[0]) {
      case 'student':
        return 'student';
      case 'teacher':
        return 'teacher';
      case 'admin':
        return 'admin';
      default:
        return 'guest';
  }}

  return (
    <>
      <CarouselSlider images={images} appUrl={appUrl} />

      <MasterLayout>
          <div className='p-4'>
            <h1>Selamat Datang !</h1>
            <h6 className='text-justify'>
              Selamat datang ke portal e-pembelajaran dalam talian kami, sebuah platform yang direka khas untuk membantu anda mencapai kejayaan akademik dan profesional dengan cara yang mudah dan interaktif. Di sini, anda akan dapat
              mengakses pelbagai kursus berkualiti tinggi, modul pembelajaran interaktif, dan bahan pendidikan yang dikemas kini secara berkala. Dengan menggunakan teknologi terkini, kami berusaha untuk memberikan anda pengalaman pembelajaran
              yang menyeronokkan, fleksibel, dan berkesan, di mana sahaja anda berada. Terima kasih kerana memilih kami sebagai rakan pembelajaran anda, dan kami berharap anda berjaya dalam setiap langkah perjalanan anda!
            </h6>
          </div>

          {
              (user == null) ? (
                <div className='p-4'>
                  <CoursesCatalogue courses={courses} appUrl={appUrl}/>
                </div>
              ) : (
                <>
                  <div className="p-4">
                    {
                      renderView(userRoles)
                    }
                    <CoursesStats stats={stats} />
                  </div>
                </>
              )
            }
      </MasterLayout>
    </>
  );
}