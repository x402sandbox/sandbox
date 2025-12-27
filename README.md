# x402 Sandbox

This is the source code of **x402 Sandbox**, the facilitator simulation and testing tool 
for the x402 payment protocol by **Gamestager**.

## Installation 

The recommended way to install x402 Sandbox is 
the dockerized version via an alias. 

On Linux, macOS or Windows if you're using bash, use:

```bash
alias x402sandbox="docker run -it --rm -p 8402:8402 x402sandbox/sandbox:latest"
```

on Windows if you're using Powershell, use:

```bash
function x402sandbox { docker run -it --rm -p 8402:8402 x402sandbox/sandbox:latest $args }
```

That's it. You may now use x402 Sandbox on your terminal.

The first time you use this alias, it will pull the x402 Sandbox image from Docker Hub.

To get the newest release you can update the image by running:

```bash
docker pull x402sandbox/sandbox
```

## Usage

### Serve

This command will spin up a local sandbox facilitator.

```bash
x402sandbox serve
```

## Features

### Magic Wallets

The sandbox environment comes with wallets that have a deterministic outcome.
You can use these to easily test that a specific scenario is implemented correctly.


|Wallet|Outcome|
|:-----|:------|
|The Whale|Never runs out of funds|
|The Broke|Needs more funds to pay|
|The Slow|Missing transaction due to network timeouts|
|The Sanctioned|OFAC restricted wallet, unable to pay|
|The Reverted|Transaction broadcasts but fails execution|



