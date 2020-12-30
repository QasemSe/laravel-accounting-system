<template>
    <div class="card card-custom">
        <!--begin::Body-->
        <div class="card-body p-0" dir="ltr">
            <div dir="rtl" class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                <span class="symbol symbol-50 mr-2" :class="'symbol-light-' + iconColor">
                    <span class="symbol-label">
                        <span class="svg-icon svg-icon-xl" :class="'svg-icon-' + iconColor">
                            <!--begin::Svg Icon | path"dashboard/media/svg/icons/Layout/Layout-4-blocks.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                    <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </span>
                </span>
                <div class="d-flex flex-column text-right">
                    <span class="text-dark-75 font-weight-bolder font-size-h3">735</span>
                    <span class="text-muted font-weight-bold mt-2">الأرباح الأسبوعية</span>
                </div>
            </div>
            <apexchart :options="options" height="150px" :series="series" class="card-rounded-bottom"></apexchart>
        </div>
        <!--end::Body-->
    </div>
</template>

<script>
export default {
    name: "ChartExample",

    data: function() {
        return {
            options: {
                chart: {
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                    sparkline: {
                        enabled: true
                    },
                    dataLabels: {
                        enabled: false
                    },
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid',
                    opacity: 1
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: ['#3699FF']
                },
                xaxis: {
                    reversed: true,
                    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Aug', 'Sep'],
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: false,
                        style: {
                            colors: '#3F4254',
                            fontSize: '12px',
                        }
                    },
                    crosshairs: {
                        show: false,
                        position: 'front',
                        stroke: {
                            color: '#a1a1b8',
                            width: 1,
                            dashArray: 3
                        }
                    },
                    tooltip: {
                        enabled: true,
                        formatter: undefined,
                        offsetY: 0,
                        style: {
                            fontSize: '12px',
                        }
                    }
                },
                yaxis: {
                    min: 0,
                    max: 55,
                    labels: {
                        show: false,
                        style: {
                            colors: '#3F4254',
                            fontSize: '12px',
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px',
                    },
                    y: {
                        formatter: function (val) {
                            return "$" + val + " thousands"
                        }
                    }
                },
                colors: ['#e1f0ff'],
                markers: {
                    colors: ['#e1f0ff'],
                    strokeColor: ['#3699FF'],
                    strokeWidth: 3
                },
                sparkline: {
                    enabled: true
                }

            },
            series: [{
                name: 'Net Profit',
                data: [40, 40, 30, 30, 35, 35, 50]
            }],

            testColors: {
                primary: '#3699FF',
            }
        }
    },
    props: {
        iconColor: {
            type: String,
            default: 'primary'
        },

    }
}
</script>

<style scoped>
.cls-1{fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:62px;}
</style>
