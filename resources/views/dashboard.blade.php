<div class="container mt-5">
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $designCount }}</h3>
                    <p>Total Designs</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $latestDesign->title ?? 'N/A' }}</h3>
                    <p>Latest Design</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $lastUpdated->format('d M Y') ?? 'N/A' }}</h3>
                    <p>Last Update</p>
                </div>
            </div>
        </div>
    </div>
</div>
