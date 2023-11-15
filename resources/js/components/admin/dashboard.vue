<template lang="">
    <div>
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- Stats -->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-primary bg-darken-2">
                                <i class="icon-camera font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-primary white media-body">
                                <h5>Products</h5>
                                <h5 class="text-bold-400 mb-0"><i class="feather icon-plus"></i> 28</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-danger bg-darken-2">
                                <i class="icon-user font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-danger white media-body">
                                <h5>New Users</h5>
                                <h5 class="text-bold-400 mb-0"><i class="feather icon-arrow-up"></i> 1,238</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-warning bg-darken-2">
                                <i class="icon-basket-loaded font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-warning white media-body">
                                <h5>New Orders</h5>
                                <h5 class="text-bold-400 mb-0"><i class="feather icon-arrow-down"></i> 4,658</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-success bg-darken-2">
                                <i class="icon-wallet font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-success white media-body">
                                <h5>Total Profit</h5>
                                <h5 class="text-bold-400 mb-0"><i class="feather icon-arrow-up"></i> 5.6 M</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Recent Orders & Monthly Salse -->
        <div class="row match-height">
            <div class="col-xl-8 col-lg-12">
                <div class="card" style="height: 396.719px;">
                    <div class="card-header">
                        <h4 class="card-title">Recent Orders</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>Total paid invoices 240, unpaid 150. <span class="float-right"><a href="project-summary.html" target="_blank">Invoice Summary <i class="feather icon-arrow-right"></i></a></span></p>
                        </div>
                        <div class="table-responsive">
                            <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                                <thead>
                                    <tr>
                                        <th>SKU</th>
                                        <th>Invoice#</th>
                                        <th>Customer Name</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-truncate">PO-10521</td>
                                        <td class="text-truncate"><a href="#">INV-001001</a></td>
                                        <td class="text-truncate">Elizabeth W.</td>
                                        <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                        <td class="text-truncate">$ 1200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">PO-532521</td>
                                        <td class="text-truncate"><a href="#">INV-01112</a></td>
                                        <td class="text-truncate">Doris R.</td>
                                        <td class="text-truncate"><span class="badge badge-warning">Overdue</span></td>
                                        <td class="text-truncate">$ 5685.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">PO-05521</td>
                                        <td class="text-truncate"><a href="#">INV-001012</a></td>
                                        <td class="text-truncate">Andrew D.</td>
                                        <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                        <td class="text-truncate">$ 152.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">PO-15521</td>
                                        <td class="text-truncate"><a href="#">INV-001401</a></td>
                                        <td class="text-truncate">Megan S.</td>
                                        <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                        <td class="text-truncate">$ 1450.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">PO-32521</td>
                                        <td class="text-truncate"><a href="#">INV-008101</a></td>
                                        <td class="text-truncate">Walter R.</td>
                                        <td class="text-truncate"><span class="badge badge-warning">Overdue</span></td>
                                        <td class="text-truncate">$ 685.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="card" style="height: 396.719px;">
                    <div class="card-content">
                        <div class="card-body sales-growth-chart">
                            <div id="monthly-sales" class="height-250" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="250" version="1.1" width="262.203" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.59375px; top: -0.921875px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="42.85546875" y="211" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#e4e7ed" d="M55.35546875,211.5H237.20299999999997" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="42.85546875" y="164.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">750</tspan></text><path fill="none" stroke="#e4e7ed" d="M55.35546875,164.5H237.20299999999997" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="42.85546875" y="118" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">1,500</tspan></text><path fill="none" stroke="#e4e7ed" d="M55.35546875,118.5H237.20299999999997" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="42.85546875" y="71.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2,250</tspan></text><path fill="none" stroke="#e4e7ed" d="M55.35546875,71.5H237.20299999999997" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="42.85546875" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">3,000</tspan></text><path fill="none" stroke="#e4e7ed" d="M55.35546875,25.5H237.20299999999997" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="229.62601953125" y="223.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Dec</tspan></text><text x="153.85621484374997" y="223.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Jul</tspan></text><text x="78.08641015625" y="223.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Feb</tspan></text><rect x="60.659355078125" y="97.23" width="4.546188281249999" height="113.77" rx="0" ry="0" fill="#00b5b8" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="75.813316015625" y="64.928" width="4.546188281249999" height="146.072" rx="0" ry="0" fill="#00b5b8" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="90.967276953125" y="120.542" width="4.546188281249999" height="90.458" rx="0" ry="0" fill="#00b5b8" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="106.121237890625" y="131.082" width="4.546188281249999" height="79.918" rx="0" ry="0" fill="#00b5b8" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="121.27519882812499" y="108.886" width="4.546188281249999" height="102.114" rx="0" ry="0" fill="#00b5b8" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="136.42915976562497" y="77.328" width="4.546188281249999" height="133.672" rx="0" ry="0" fill="#00b5b8" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="151.583120703125" y="97.23" width="4.546188281249999" height="113.77" rx="0" ry="0" fill="#00b5b8" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="166.73708164062498" y="64.928" width="4.546188281249999" height="146.072" rx="0" ry="0" fill="#00b5b8" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="181.89104257812497" y="120.542" width="4.546188281249999" height="90.458" rx="0" ry="0" fill="#00b5b8" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="197.04500351562498" y="131.082" width="4.546188281249999" height="79.918" rx="0" ry="0" fill="#00b5b8" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="212.19896445312497" y="108.886" width="4.546188281249999" height="102.114" rx="0" ry="0" fill="#00b5b8" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="227.35292539062496" y="77.328" width="4.546188281249999" height="133.672" rx="0" ry="0" fill="#00b5b8" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="chart-title mb-1 text-center">
                            <h6>Total monthly Sales.</h6>
                        </div>
                        <div class="chart-stats text-center">
                            <a href="#" class="btn btn-sm btn-primary mr-1">Statistics <i class="feather icon-bar-chart"></i></a> <span class="text-muted">for the last year.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="">
    
</style>