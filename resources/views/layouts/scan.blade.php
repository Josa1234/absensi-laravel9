@extends('layouts.app')

@section('pageTitle', 'Siswa')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Scan Kartu</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Live Monitoring</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="row justify-content-around">
                    <div class="col-4">
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUVEhgSEhUSEhISGBIYERIYEhEYGBESGBgZGRgYGBgcIS4lHB4rIRgYJjgmKy8xNTU1HCQ7QDszPy40NTEBDAwMEA8QHhISGjQhISExNDQ0NDQ0NDE0NDQxNDQ0NDQ0MTQ0PzExNDQ0NDE0NDQ0NDE0ND80NTQxNDExMTQ0NP/AABEIALcBEwMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAEAAIDBQYBBwj/xABAEAACAQIDBQUECAMHBQAAAAABAgADEQQhMQUSQVFhBhNxgZEiMqGxByNCUnKiwfBiguEUFTNTkrLxJENzwtH/xAAaAQADAQEBAQAAAAAAAAAAAAAAAQIDBAUG/8QAIxEBAQEAAgIDAAIDAQAAAAAAAAECESEDMRIyQRNxBCJRYf/aAAwDAQACEQMRAD8A1jNGRoaPUTw965epnPCNpC7Ql0g705nK14DsZwCSinO93CqlMERnSJwysnUTxJOtGAzfMZ6G0jCkgNJ4WhmkjGpWgWJ0hbGB4k5SkxR19ZY7OldX1lls6a+H7M/N9VqgkqyNZKondHDThHiNEcIydiinYBycnYjAjDOGOnDA3DGNH2jSIA0xhEeRGmMMn2gzrHoo+UE2bTvVXob+kJ2xnWboQPhO7IT6wdA3yjH4PqpAa1OW9VIHWSUhTmlFDDTii6PmtIjQqkICjSww8+Zz293U4TrSnGw0MpLJe7m2cMbuqs4aQVaNpcskDxKR3AztS1BIrybEQYtI4dMvMdcyBjHs0aBNsWJ1EtJodSMCppC0m1sYaidjBMRpCCYLXMnklRWXOWWz1gT6yzwAm3h+zLzfUeokqiNUR6idscRwjogI6UlyKdtFaAcnLR1pyANnDH2itAIzGmPIjWEAZGsJJaMcxhjNoG9RzzY/CGbET2yeSnh1EDxRu7a6t85abCT39dFHr/xGd9DXWDVVhzj9ecHqKOkaAHd9flFJ92KAFUzLLCmVKPLDDPPlsXt9BudL2jJxAqDwgPOzOo4tTs94DizlCneV+MfKVq9DM7U2KbOBF5LjKmcB7yY/rsz6EF51HgrPI++i1eDW6PCEaU9KtD6DzTFtY6GEwesZLeQ1ZqzAPrLTADKVbay1wAym3g+zLy+lioj1EaokgE7o4qcBO2iAnbSipRRRQIpwzs5AEonSI+mseyQAYiMYQkpGFIyDmRubAnkDCCsFxZtTY8lb5QDG1Bn4y62IvsN4r+spHOfn0mh2QPqybasfgBGq+hZEgqCTtIakEB5yP/esUADSpDMNVlWoMMwwny8zeX0WrOGgw9WEipAsKsN3J0ZzeHJqzk16sAxVXKE1hK7ES+4MyKjGPnAN+GYtDACpk8NpT2eRkxNGXk6XyLoGWmHMqKBlph2mmGOh4MgqmSAyKpNmYJtZcbPGUqSucucAuU28P2Y+b6j1EeonFEkUTtjkpATs6BHRkZKDtHthqO6lO2+degmgY2F55zja9TEYyolNQ4pixvCzV6zOxnjntZYbtawyqKD1EvMH2goPlv7p5Gee4miytuspRvutl6cDIUQE2Y7vLxmed654sXrE45j15KoIupDDoY7v+eU8qTHVqXtK7EcLGWGz+3T7606ihrsqknVbm15sxejCoDHXEBqEqSCtiCQbHiMjkY1a5HPzj4LkcVlZtht2k56fOEDFSu2/V/6dzzKj4xGyBqZ68Zp9jt9UDzLcOsx4Jvxmy2StqKeF/UmKVVFNYnhIjJHjXEpCDdMUfbwigEP9jk9DDWMujhZxcPPE/iev/IbhktDN2KlTkpSa5z0y1rsBXWAVaV5cPTkPcSbhWdcKCvhLwJ8D0msOFjGwfSP4Km2OqYMwc4U8ps32eOUi/u3pI14rVTyMvRwpljhsOZdps3pCaWAtwjz47E68kVSYY2kdXDGaMYSQVsNlNviz+TMGlnLPBLlOVqGcIwyy/D7R5b0IUR4E4BHgTsjlK07adtHIhJsBcnQRkFx28UKopZ2yVRxJgGyOwzYcGoKxevUuagIAS54IdcuuvSbHB4UILnNjqeXQQmE1ZeYXDAbSwYP1ddAw5EfEGeV9pNopQxTUqYZ6a21c3U8QCeWc9o7U7RHdm1txAWL8yAdOQ+c+bNoYg1Kr1DmXYnxzmm7zmWzsZ13eGz2ZthUIrBS6brlVbg2ai4HW8rNjDvsdQp695iKIP4S6lj4AXPlIavsUgg4AfDU+ZvLX6OsJvYl650w6MV/8lS6L+XvD5Qv1kR7tr1fE1952YH3mY+pJkLVjAd8iNNYxpUvaztG+Fq0WQBkdaneUzo26UsQeB9oywxO0Ur4MVE91yMuKsCQQfAieffSBjd/EimDlSRVP4mO83w3ZYdkMbvYOpSJuUqhlH8LKAfiPjM9XtpmdD0Gc22zx9Umnur8pil1m2wq2poL3sq+WQih6TPGNHkxjNKQjv4RTtv3lFANWUiFOTWnQJ5/Du5RqkfuSRRHAS5lNoc04u7hForQ+I+QcU47upNadAj+I5Qd1EKIhForQ4HyqEUhHinJAI4COZLlEyQaumUNaDVhFqdCVR10ziprJqwzjVEnxfZXk9HCPEaBJFF8hrOpznKpJsMydJcYPChBc5sdTy6CNwWF3Rc+8fywuMnJUY/Hb3sIfY+033+g6fPw1pNtdpw9VsLhzcJlXqDTe4op49T5c5PhHug6TXx457pa6nLJfSbtDu8Eyg2aqQo8DmZ4thrBt45hc7c7aD1tPQvpSrNVrrSQEpRAZ7cC3TwEwuJwpQWurd5bdKm/sjXwzt6Q8t/24/wCFicZF4vEbyqRoQPKeg9hsJ3eCDn3sQ7ufwL7CfJz/ADTzcUmd1ppmzFUUc3YhR8SJ7KlFUVaae5SVET8KKFB87X84Tu8ovUdcyF3CgsxsqgljyAFyY5jKDtljO7wjgH2qpCDwbNvyhvWO0R5rj8UatV6h1dma3K5yHkLDymi7IL9W55sPgJlQfjNl2XTdw9zlvMT5cJjW0XCnObxVsAOQtPPy+7nN+j7yhuYB9Y8p06x/f9JG2f6GSH5Rl8paDf3winfL4xQDZ2iAnZ2cbsIR04IoE7FEJ2BFadAinYBwxRGKMOidnBOiOFSMGxGkIdwNSB5wPEVVOQN5OvR5VtXWNUR7uoOecY2IyyHy0hicL1Pl0eIfh/ZN7AtwJ4eEpv7co1z6Rp2ixIRAS7myINWP6AcTwms0X8TT4XFBmZNWQAk2yF9B8DM126249OgyUCQ7+zvjXPIhTw8ZBtzaFSjRajQ3mqG5xOJCndRiLFVPMDLoBzmc21XephaNennuW7wdV9lviIc9X/qZmcy31yzmyseabWI3eBE22A2kpXeBy1PSZM4JalPvEzqavr7THgBKypinpo6AkEgr5nKP/F/ys82a/Ov/AFz583j81sz7l4svV/tPhnSvUxGIdwHZmIpnINSXQqfvZaTF4tg1dre6t7DqST+svKlkp73BQc/0MzCvkWOrEmVO9XVaa9cNN2Hwu/jVqH3cOr1Dl9v3U/MwP8s9HJymS+j/AAu5h2qkZ13sv4KdwPzM3+maljNc+mN9kZ599IWM3qyURpSXeb8T218FA9ZvwbXJyA1PITx7a2LNas9X77Mw6Loo9AItXo8zsE09C2YlsPTH8CX8SovPPGnpGGBFNByRP9ombSIcQcp6Bgh9Wn4V+U8+xHLqPnPRaItTUfwr8hKynReEadI4xrSkGbkUdvTkA2t4hGAx15xus8TsYDO70AeIrxoMV4EdeK8bOwBEzoMbOiAOjKtS3j8usbUq2yGvyglarYXMocOYioB1aUeO2kASqkEjXkI/EM7X3bre924kdOUzuPp7md789TnFa1zmehNTabZ8+cHp4p3YU0uzHgOA5k8BC8BsbfAevfPSncgjqxB16S/weFVRuU1VRyAtfx5yc/7VetZz6nKhw+ycRuli9NWsbD2mu3wsJc7AprTc097vMQUD4ioLWoqx9mmpGhNmJt93wheE2cwY3YhM8uN+h5TtepToqdxVW/vEasep1J8ZrJIy1r5dAu0lcCmwyAAItKXYFG2EAbMVGqNbkCd3/wBb+cB7Q7R3/Zv1A4Adesm7PYveobhOdNiP5Tmv6jyk5v8AsW5xmRUbRwb4apv0/cYmw4A8jKXbdRXqKEWw3QXP3qhuSfjPQWRXUo4uDMVt3ZjU6hOosM+Y4GK+PM18v1zfw4vknk44snH9/wBsntupu090auQJRkaAZnIAczLDbdS9ULwQXPn+x6ybsrg+9xlMEXVCaj+Ce0PVt0ec6MzpWr29N2dhO5opS/ykRT1e13PmxYyZo62XjGkTVgqO1WL7rBuQbM43F8WyNvBd4+U8pvNp9IuMu1OgPsguw6tkvwB9Zi5nfbTPox56ZwHQTziiLuova7LnyznopbLP1k/q4gYXdBzdPmJ6O+QHQCee4Vd7EU1/jX4T0OpKiNIyP6RpMd+saZSUZijtyKAa9TO3kKtH3nE7EgMdeRAxwMIKkvOgxl50GMkl4o0GOUXNhrx6QIpG720ixJ3AOt/UcPn6Suq4q2mcfHHsTv0JZpGyb2sESuSc9OUIFYWj9nZYjrYJTrfyJ/QyJdk02sXXfteytYr4lePhpJTiwNZLSxAjnA5qNcHY2BsotYW/rJAFXmTzvOYnFG1gJnMdjqtiAAB1MmyZ9KzLpc4/a4Vcz6TF7U2u7k2Nl4QbGY02ILZceQErLtU0uqc/tN4corbVycEWLtYZ/ebgP6w/ZdTcqADRlKt1sN4H4fGBg7o3UHTSW+EwPdjef/EYafcHLxhC1elxhHzhuN2etanunJvsNyP/AMldhDLvDGbZ7jm11Xz/ANpMI9HFVKdQFW3vUcCOk0PYCmF36rZF91FP8IO8/qd3/TPV9s7Cw+KTcxFNXt7r2s6fhYZjwmRxXZKph1+pdGRb2QgqVHxv6y89IvY/vgdDHIbzMd9UX3lbxGY9RI9rbc7rDvYnvHBVOhIsW8hn6S/lEXNY3b+N77FVKmqliF/AvsrbyF/OVs5vThaRy04PpZuv4l+c9GJy8hMBs+kWqLYGwZSTbIAG83zHL0iOJdiJfFp0uZvW1mH7Ni+KHQGbhh4yonfswD9+kYf+JKV4yNtI0GRRm8ecUY4alHkitMhtHtvhKJKhzWcfYpDf9W934zO4z6R8Q2WHoUqY+9Udna3Oy2E5J49a/HTd5n69UUzlbEIi71R0pqNWdlUDzM8Qx3afHVbipiqig/YpBaY8Lrn8ZTOis2893f7zsXP5rzXPgv7UXzT8j2jHdusDTHs1e/PKkN8H+fJPzTP436TDa1DDgHg1Spf1Rbf7p51vfsxrNaaZ8OZ77ZXy6rR4/trjqlwaxpg/ZpqqW8GHtfGa76IscW/tSOSxJo1CxJJYsHRrk6+4s8nauBNN9He2DT2giX9nEA0mHVirKfVbeZl3Mk4hS23t7dtNC9Jt33l9pBxJXOw8RcecoKzgAEHIi4OWYl1iMYqncvdhYkcpg+0G0jSrGnb2SA1M8Nw8B4EEeQnL5J+urxX8XBxgHGA4jaVjkZSPjS0Gq1LamZN+IvP73HO55XhFPbthobzE1qoBuDn0nTtJtBl1EoumzPaQD3xny4yn2htPfudAZnTVvxzk9HPXOF7PmT0mFPesW0Gi8/GTuQByEW7bWXmw9ib5FasPY1p0yPe5O45chCTnpOtfGc0N2dwN713U2H+Hcani3gOEKxTe1LvGNYTP12zlWcdMZebyJwjZy9wzTPYY5y9wc0yjSxEhxCbykHjJhOGWzYXa+Aam1xex48pR1Rc+1n45z0rHYVXUgjWYPa2zzTfT2eBkWcNc3lUMgzyHoI1lHIegkj5SMmSo119kDqPnCm0g7jIeKydjlKymj+yoviT+EzbTGdkB9c55LNpbMzSemWvZEeMgqSdtIPVMZIYpHvTsZPIk+EIV8oHTccYmrjnL5SKQ3POSMbZmAPiwosPWQviWaHyEyOetBauJ8YM/U/GRhpN0qZTB+clwuPNKqlRSQ1J6brbmjBv0gdR4OWk2qmX0JsFxVVqzG4YBr31vmJUdsKe/SFRbb+HJbIkk0j746AWB8usqexG1C2EQX9wFHH4T7PwtNCWHjzB0I4iZanXDbPvli1xRbMGRu7HjIMfQOHrNT+x71M86Z0HiMx5R9Dec7qK7sfsqpJ9BMK6OXGTrELS9wfY/GVdKLIPvOyoPQm/wlvS+j5lF6tZRzVFJ/M1vlDlPLFgiTUnsciZuaHZrDLqhcjizsb+IBA+EOTYuG/yaf+mPN+XoXXx9qDs3s01W7yoPqkOV/wDuOOH4Rx8hzmyY5RqqAAAAAMgAAAByAic5TXM4Yb1dVW49spQ1TnLnHNKhxnJvs8+kuE1l9hTKLDHOXmFl5TpYoZ0xqTs0ZmtANo4FaiEEZ8JYGMIgHmW1MG1NypGXAwC09D7RYFXpM1vaAynn9pnqcNc3lzW3jJH0ka6jzj6pyjgq57GLeo56WmuvnMr2LX3zzM05b9Jc9MteydoLWciTVG/56wSq/OMkW/FIC8UYeOVq/AQfvDFFIt7XJD1bOOaqdBFFKIt62uZjd+KKI0bG8bFFEbZfR7irPUpH7Shh4g2PzHpPQFeKKRpefSr7Q4QPS3wAWpXdb8V+0p9L+U9N2L3fcI9FEpo6owVUCizKDoPGKKZ32q+liDAMecjFFI36GfakvnJkMUUXhPyJBI6hyiinQxU2OMrWiikrno/DtnL7CGKKXlOlkk6ZyKWzcjDFFAANstak3hPOKgziikaXh2muV+UZW0iijyq+2l7JJam3WXjNrORS56Y69oKj2y5fKBV6lvA/OKKMAmqmKKKBv//Z"
                            class="rounded float-start" alt="...">
                    </div>
                    <div class="col-4">
                        <div id="loadingAnimation" style="display: none;">
                            <img src="{{ asset('img/loading.gif') }}" alt="Loading..." id="loadingImage">
                        </div>
                        <div id="successInfo" style="display: none;">
                            <img src="{{ asset('img/error.png') }}" alt="Success">
                            <p>Nama: <span id="nama"></span></p>
                            <p>UID: <span id="uid"></span></p>
                            <p>Jam: <span id="jam"></span></p>
                        </div>
                        <div id="errorInfo" style="display: none;">
                            <img src="{{ asset('img/error.png') }}" alt="Error">
                            <p>Invalid</p>
                            <p>UID: <span id="errorUid"></span></p>
                            <p>Jam: <span id="errorJam"></span></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function showLoading() {
            document.getElementById("loadingAnimation").style.display = "block";
        }

        function hideLoading() {
            document.getElementById("loadingAnimation").style.display = "none";
        }

        function showSuccessInfo(data) {
            document.getElementById("successInfo").style.display = "block";
            document.getElementById("nama").innerText = data.nama;
            document.getElementById("uid").innerText = data.uid;
            document.getElementById("jam").innerText = data.jam;
        }

        function showErrorInfo(data) {
            document.getElementById("errorInfo").style.display = "block";
            document.getElementById("errorUid").innerText = data.uid;
            document.getElementById("errorJam").innerText = data.jam;
        }

        // Panggil fungsi showLoading() sebelum request AJAX
        showLoading();

        $.ajax({
            url: 'url_permintaan_ajax',
            method: 'POST',
            data: {
                /* data yang akan dikirimkan */ },
            success: function(data) {
                // Panggil fungsi hideLoading() setelah menerima respon dari request AJAX
                hideLoading();
                // Panggil showSuccessInfo(data) dengan data yang diterima
                showSuccessInfo(data);
            },
            error: function(xhr, status, error) {
                // Panggil fungsi hideLoading() setelah menerima respon dari request AJAX
                hideLoading();
                // Panggil showErrorInfo(data) dengan data yang diterima
                showErrorInfo(xhr.responseText);
            }
        });
    </script>

@endsection
