<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header">demo</div>

          <div class="card-body">
            <ve-line :data="chartData" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import VeLine from 'v-charts/lib/line'

  export default {
    created () {
      this.chartData = {
        columns: ['日期', '销售量'],
        rows: [
          {'日期': '1月1日', '销售量': 123},
          {'日期': '1月2日', '销售量': 1223},
          {'日期': '1月3日', '销售量': 2123},
          {'日期': '1月4日', '销售量': 4123},
          {'日期': '1月5日', '销售量': 3123},
          {'日期': '1月6日', '销售量': 7123}
        ]
      }
    },
    components: {VeLine}
  }
</script>
