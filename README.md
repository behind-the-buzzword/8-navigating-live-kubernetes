# Behind The Buzzword - Kubernetes Special
Welcome the the BTBW Kubernetes special. Today we'll be taking an existing docker-compose setup (Think development environment) and building a Kubernetes configuration around it.

## Prerequisites
Make sure you've got a local Kubernetes cluster working! Docker for Windows / Mac now has a built in Kubernetes cluster you can enable.

You can check you've enabled the cluster and set your context by running
```
kubectl get nodes
```

If this doesn't work shout @dblencowe