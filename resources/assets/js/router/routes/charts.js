import EchartsShow from '../../components/EchartsShow.vue';
import LinePage from '../../components/pages/LinePage.vue';
import BarPage from '../../components/pages/BarPage.vue';
import PiePage from '../../components/pages/PiePage.vue';
import ScatterPage from '../../components/pages/ScatterPage.vue';

export default [
  {
      path: '/EchartsShow',
      component: EchartsShow,
      children:[
          {
              path: '/',
              component: LinePage
          },
          {
              path: 'BarPage',
              component: BarPage
          },
          {
              path: 'PiePage',
              component: PiePage
          },
          {
              path: 'ScatterPage',
              component: ScatterPage
          }
      ]
  }
]