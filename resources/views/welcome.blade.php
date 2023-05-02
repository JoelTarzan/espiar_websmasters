<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Espiar Webmasters</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container m-5">

        <div class="mb-3">
            <form method="get" action="{{ route('index') }}" class="d-flex gap-3">
                <div>
                    <div class="form-group col">
                        <input type="text" class="form-control" id="filter_domain" name="filter_domain"
                            placeholder="Domini" value={{ $_GET['filter_domain'] ?? '' }}>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>

        <div class="row">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Domini</th>
                    <th>Adsense</th>
                    <th>Google Analytics</th>
                    <th>Whois</th>
                    <th>Data de expiració</th>
                    <th>DNS</th>
                    <th>IP</th>
                    <th>Discovered</th>
                    <th>CMS principal</th>
                </thead>
                <tbody>
                    @foreach ($domains as $domain)
                        <tr>
                            <td>{{ $domain->domain }}</td>
                            <td class="text-center">
                                {{ $domain->adsense->code ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $domain->analytic->code ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $domain->whois_raw ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $domain->expired_date ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $domain->dns ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $domain->ip ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $domain->discovered ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $domain->cms_principal ?? '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $domains->appends($_GET)->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
