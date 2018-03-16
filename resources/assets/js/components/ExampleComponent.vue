<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <br>
        <div class="card card-default">
          <div class="card-header">注册量</div>
          <div class="card-body">
            <ve-line :data="chartData1" />
          </div>
        </div>
        <br>
        <div class="card card-default">
          <div class="card-header">浏览量</div>
          <div class="card-body">
            <ve-line :data="chartData2" />
          </div>
        </div>
        <br>
        <div class="card card-default">
          <div class="card-header">点击量</div>
          <div class="card-body">
            <ve-line :data="chartData3" />
          </div>
        </div>
        <br>
        <br>
      </div>
    </div>
  </div>
</template>

<style>
  .col-md-8 {
    padding: 0;
  }
</style>

<script>
  import VeLine from 'v-charts/lib/line'

  export default {
    created () {
      this.chartData1 = {
        columns: ['日期', '浏览量'],
        rows: [
          {'日期': '1月1日', '浏览量': 123},
          {'日期': '1月2日', '浏览量': 1223},
          {'日期': '1月3日', '浏览量': 2123},
          {'日期': '1月4日', '浏览量': 4123},
          {'日期': '1月5日', '浏览量': 3123},
          {'日期': '1月6日', '浏览量': 7123}
        ]
      }
      this.chartData2 = {
        columns: ['日期', '注册量'],
        rows: [
          {'日期': '1月1日', '注册量': 123},
          {'日期': '1月2日', '注册量': 1223},
          {'日期': '1月3日', '注册量': 2123},
          {'日期': '1月4日', '注册量': 4123},
          {'日期': '1月5日', '注册量': 3123},
          {'日期': '1月6日', '注册量': 7123}
        ]
      }
      this.chartData3 = {
        columns: ['日期', '点击量'],
        rows: [
          {'日期': '1月1日', '点击量': 123},
          {'日期': '1月2日', '点击量': 1223},
          {'日期': '1月3日', '点击量': 2123},
          {'日期': '1月4日', '点击量': 4123},
          {'日期': '1月5日', '点击量': 3123},
          {'日期': '1月6日', '点击量': 7123}
        ]
      }
    },
    components: {VeLine}
  }
</script>
