import EchartsShow from '../../components/EchartsShow.vue';
import LinePage from '../../components/pages/LinePage.vue';
import BarPage from '../../components/pages/BarPage.vue';
import PiePage from '../../components/pages/PiePage.vue';
import ScatterChart from '../../components/ScatterChart.vue';

export default [
  {
      path: '/EchartsShow',
      component: EchartsShow,
      children:[
          {
              path: '/',
              component: LinePage
              // component: resolve => require(['../../components/pages/LinePage.vue'], resolve)
          },
          {
              path: 'BarPage',
              component: BarPage
              // component: resolve => require(['../../components/BarChart.vue'], resolve)
          },
          {
              path: 'PiePage',
              component: PiePage
              // component: resolve => require(['../../components/PieChart.vue'],resolve)
          },
          {
              path: 'ScatterChart',
              component: ScatterChart
              // component: resolve => require(['../../components/ScatterChart.vue'],resolve)
          }
      ]
  }
]