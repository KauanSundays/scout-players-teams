<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Perfil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rqoHzjUIiX+6jhKpxi7cdo5GCpGRU1Tu7w5ylUf0B8DQ/kZz6k69JU5pK6QVSlMO" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.2);
        }

        .card-faculdade {
            background-color: #ff6b6b;
            color: white;
        }

        .card-avaliador {
            background-color: #6ab04c;
            color: white;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4 card-faculdade">
                    <div class="card-body text-center">
                        <h5 class="card-title">Criar Perfil de Faculdade</h5>
                        <p class="card-text">Crie um perfil se você representa uma faculdade.</p>
                        <a href="{{ route('register.faculdade') }}" class="btn btn-primary">Criar Perfil</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-avaliador">
                    <div class="card-body text-center">
                        <h5 class="card-title">Criar Perfil de Avaliador</h5>
                        <p class="card-text">Crie um perfil se você deseja ser um avaliador.</p>
                        <a href="{{ route('register.avaliador') }}" class="btn btn-success">Criar Perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
