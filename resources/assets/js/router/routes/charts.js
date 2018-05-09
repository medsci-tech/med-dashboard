import EchartsShow from '../../components/EchartsShow.vue';
import LinePage from '../../components/pages/LinePage.vue';
import BarPage from '../../components/pages/BarPage.vue';
import PiePage from '../../components/pages/PiePage.vue';
import ScatterPage from '../../components/pages/ScatterPage.vue';

export default [
  {
      path: '/echarts-show',
      component: EchartsShow,
      children:[
          {
              path: 'link-page',
              component: LinePage
          },
          {
              path: 'bar-page',
              component: BarPage
          },
          {
              path: 'pie-page',
              component: PiePage
          },
          {
              path: 'scatter-page',
              component: ScatterPage
          }
      ]
  }
]