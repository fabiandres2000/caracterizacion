<template lang="">
    <div>
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- Stats -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-primary bg-darken-2">
                                <i class="icon-user font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-primary white media-body">
                                <h3>Personas Caracterizadas</h3>
                                <h3 class="text-bold-400 mb-0"><i class="feather icon-plus"></i> 28</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-danger bg-darken-2">
                                <i class="icon-home font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-danger white media-body">
                                <h3>Hogares Caracterizados</h3>
                                <h3 class="text-bold-400 mb-0"><i class="feather icon-arrow-up"></i> 1,238</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-warning bg-darken-2">
                                <i class="icon-globe font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-warning white media-body">
                                <h3>Tenencia de Tierras</h3>
                                <h3 class="text-bold-400 mb-0"><i class="feather icon-arrow-down"></i> 4,658</h3>
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
                        <h4 class="card-title">Últimas personas caracterizadas</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                            </ul>
                        </div>
                        <hr>
                    </div>
                    <div class="card-content">
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
                                    <tr>
                                        <td class="text-truncate">PO-15521</td>
                                        <td class="text-truncate"><a href="#">INV-001401</a></td>
                                        <td class="text-truncate">Megan S.</td>
                                        <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                        <td class="text-truncate">$ 1450.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">PO-15521</td>
                                        <td class="text-truncate"><a href="#">INV-001401</a></td>
                                        <td class="text-truncate">Megan S.</td>
                                        <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                        <td class="text-truncate">$ 1450.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="card" style="height: 396.719px;">
                    <div class="card-header">
                        <h4 class="card-title">Personas caracterizadas los últimos 10 días</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                            </ul>
                        </div>
                        <hr>
                    </div>
                    <div class="card-content">
                        <div class="card-body sales-growth-chart">
                            
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
<style scoped>
    i {
        line-height: 1.45;
    }
</style>